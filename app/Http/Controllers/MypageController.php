<?php
  
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\PrefectureRegion;
use App\Models\Facility;
use App\Models\Qualification;
use App\Models\Nursery;
use Hash;
use Illuminate\Support\Str;
use Mail; 
  
class MypageController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index() {
      return view('mypage.index');
    }

    public function getFollowing() {
      if(Auth::check()){
        $prefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
        $facilityData = Facility::select('id', 'name')->get();

          
        $tokyoCityData = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
        ->where('tbl_prefecture_region.name', 'like', '%東京%')
        ->where('tbl_city_region.flag', 1)
        ->select('tbl_city_region.id', 'tbl_city_region.name', 'tbl_prefecture_region.id as p_id')
        ->get();

        $majorCity = DB::table('tbl_majorcity')->get();

        $otherCityData = $majorCity->map(function($item){
          $city_ids = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
            ->where('tbl_city_region.name', 'like', '%'.$item->name.'%')
            ->select('tbl_city_region.id', 'tbl_prefecture_region.id as p_id')
            ->get();
          $partUrl = '';
          $len = count($city_ids);
          for($i=0;$i<$len;$i++) {
          $partUrl.='city_ids[]='.$city_ids[$i]->id;
          if($i < $len-1) $partUrl.='&';
          }

          return [
          'id' => $item->id,
          'p_id' => $city_ids[0]->p_id,
          'name' => $item->name,
          'cityUrl' => $partUrl
          ];
        });
        $mainPrefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')
                                          ->whereIn('en_name', ['tokyo', 'kanagawa', 'saitama', 'chiba'])
                                          ->get();
        $user = Auth::user();

        $query = Nursery::join('tbl_nursery_facility', 'tbl_nursery.id', '=', 'tbl_nursery_facility.nursery_id')
                        ->join('tbl_facility', 'tbl_facility.id', '=', 'tbl_nursery_facility.facility_id')
                        ->join('tbl_cooperate', 'tbl_nursery.cooperate_id', '=', 'tbl_cooperate.id')
                        ->join('tbl_city_region', 'tbl_nursery.city_id', '=', 'tbl_city_region.id')
                        ->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id');
        $result =$query->leftJoin('tbl_nursery_follow', function ($join) use ($user) {
          $join->on('tbl_nursery_follow.nursery_id', '=', 'tbl_nursery.id')
              ->where('tbl_nursery_follow.user_id', '=', $user['id']);
        })->select('tbl_nursery_follow.id as followed_id', 'tbl_nursery.*', 'tbl_prefecture_region.name as prefecture_name', 'tbl_cooperate.name as cooperate_name', 'tbl_city_region.name as city_name', 'tbl_facility.name as facility_name', 'tbl_nursery_facility.facility_id')->get();
                
        // $result = $query->select('tbl_nursery.*', 'tbl_prefecture_region.name as prefecture_name', 'tbl_cooperate.name as cooperate_name', 'tbl_city_region.name as city_name', 'tbl_facility.name as facility_name', 'tbl_nursery_facility.facility_id')->get();
        $grouped = $result->groupBy('id')->map(function ($item) {
          $first = $item->first();
          $nursery = $first->toArray();
          $nursery['facility_id'] = $item->pluck('facility_id')->toArray();
          $nursery['facility_name'] = $item->pluck('facility_name')->toArray();
          return $nursery;
        });
        $statistics = DB::table('tbl_review_relation')->join('tbl_review', 'tbl_review.review_id', '=', 'tbl_review_relation.id')
                                    ->groupBy('nursery_id')
                                    ->select('tbl_review_relation.nursery_id', 'tbl_review.content', DB::raw('avg(tbl_review.rating) as review_rating'), DB::raw('count(*) as review_count'))
                                    ->get();
        $followed_count = 0;
        $merged = $grouped->map(function ($item) use ($statistics, &$followed_count) {
          $id = $item['id'];
          $stat = $statistics->where('nursery_id', $id)->first();
          
          if($item['followed_id']) $followed_count++;
          return [
              'id' => $id,
              'name' => $item['name'],
              'cooperate_name' => $item['cooperate_name'],
              'address' => $item['prefecture_name'].$item['city_name'].$item['address'],
              'facility_id' => $item['facility_id'],
              'facility_name' => $item['facility_name'],
              'content' => $stat ? $stat->content : "",
              'review_rating' => $stat ? number_format($stat->review_rating, 1) : 0,
              'review_count' => $stat ? $stat->review_count : 0,
              'followed_id' => $item['followed_id']
          ];
        });
        $followedData = $merged->take(min(3, $followed_count));

        $query = Nursery::join('tbl_nursery_facility', 'tbl_nursery.id', '=', 'tbl_nursery_facility.nursery_id')
                        ->join('tbl_facility', 'tbl_facility.id', '=', 'tbl_nursery_facility.facility_id')
                        ->join('tbl_cooperate', 'tbl_nursery.cooperate_id', '=', 'tbl_cooperate.id')
                        ->join('tbl_city_region', 'tbl_nursery.city_id', '=', 'tbl_city_region.id')
                        ->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id');

        $user = Auth::user();
        $query->leftJoin('tbl_nursery_follow', function ($join) use ($user) {
          $join->on('tbl_nursery_follow.nursery_id', '=', 'tbl_nursery.id')
                ->where('tbl_nursery_follow.user_id', '=', $user['id']);
        });
        $result = $query->select('tbl_nursery.*', 'tbl_nursery_follow.id as followed_id', 'tbl_prefecture_region.name as prefecture_name', 'tbl_cooperate.name as cooperate_name', 'tbl_city_region.name as city_name', 'tbl_facility.name as facility_name', 'tbl_nursery_facility.facility_id')->get();

        $grouped = $result->groupBy('id')->map(function ($item) {
          $first = $item->first();
          $nursery = $first->toArray();
          $nursery['facility_id'] = $item->pluck('facility_id')->toArray();
          $nursery['facility_name'] = $item->pluck('facility_name')->toArray();
          return $nursery;
        });
        $statistics = DB::table('tbl_review_relation')->join('tbl_review', 'tbl_review.review_id', '=', 'tbl_review_relation.id')
                                    ->groupBy('nursery_id')
                                    ->select('tbl_review_relation.nursery_id', 'tbl_review.content', DB::raw('avg(tbl_review.rating) as review_rating'), DB::raw('count(*) as review_count'))
                                    ->get();
        $merged = $grouped->map(function ($item) use ($statistics) {
          $id = $item['id'];
          $stat = $statistics->where('nursery_id', $id)->first();
          if(!isset($item['followed_id']))
            return [
                'id' => $id,
                'name' => $item['name'],
                'cooperate_name' => $item['cooperate_name'],
                'address' => $item['prefecture_name'].$item['city_name'].$item['address'],
                'facility_id' => $item['facility_id'],
                'facility_name' => $item['facility_name'],
                'content' => $stat ? $stat->content : "",
                'review_rating' => $stat ? number_format($stat->review_rating, 1) : 0,
                'review_count' => $stat ? $stat->review_count : 0,
                'followed_id' => isset($item['followed_id'])? $item['followed_id']:null
            ];
        })->filter();

        $merged = $merged->sortByDesc('review_rating');
        $recommendedData = $merged->take(min(3, count($merged)));

        $data1 = compact('prefectureData', 'facilityData', 'tokyoCityData', 'otherCityData', 'mainPrefectureData', 'followedData', 'recommendedData');

        return view('mypage.following', $data1);
      }
    }

    public function getLike() {
      $prefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
      $facilityData = Facility::select('id', 'name')->get();

      $tokyoCityData = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
                          ->where('tbl_prefecture_region.name', 'like', '%東京%')
                          ->where('tbl_city_region.flag', 1)
                          ->select('tbl_city_region.id', 'tbl_city_region.name', 'tbl_prefecture_region.id as p_id')
                          ->get();

      $majorCity = DB::table('tbl_majorcity')->get();

      $otherCityData = $majorCity->map(function($item){
        $city_ids = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
                      ->where('tbl_city_region.name', 'like', '%'.$item->name.'%')
                      ->select('tbl_city_region.id', 'tbl_prefecture_region.id as p_id')
                      ->get();
        $partUrl = '';
        $len = count($city_ids);
        for($i=0;$i<$len;$i++) {
          $partUrl.='city_ids[]='.$city_ids[$i]->id;
          if($i < $len-1) $partUrl.='&';
        }

        return [
          'id' => $item->id,
          'p_id' => $city_ids[0]->p_id,
          'name' => $item->name,
          'cityUrl' => $partUrl
        ];
      });

      $mainPrefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')
                                          ->whereIn('en_name', ['tokyo', 'kanagawa', 'saitama', 'chiba'])
                                          ->get();

      $data1 = compact('prefectureData', 'facilityData', 'tokyoCityData', 'otherCityData', 'mainPrefectureData');
      return view('mypage.like', $data1);
    }

    public function getDraft() {
      $prefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
      $facilityData = Facility::select('id', 'name')->get();

      $tokyoCityData = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
                          ->where('tbl_prefecture_region.name', 'like', '%東京%')
                          ->where('tbl_city_region.flag', 1)
                          ->select('tbl_city_region.id', 'tbl_city_region.name', 'tbl_prefecture_region.id as p_id')
                          ->get();

      $majorCity = DB::table('tbl_majorcity')->get();

      $otherCityData = $majorCity->map(function($item){
        $city_ids = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
                      ->where('tbl_city_region.name', 'like', '%'.$item->name.'%')
                      ->select('tbl_city_region.id', 'tbl_prefecture_region.id as p_id')
                      ->get();
        $partUrl = '';
        $len = count($city_ids);
        for($i=0;$i<$len;$i++) {
          $partUrl.='city_ids[]='.$city_ids[$i]->id;
          if($i < $len-1) $partUrl.='&';
        }

        return [
          'id' => $item->id,
          'p_id' => $city_ids[0]->p_id,
          'name' => $item->name,
          'cityUrl' => $partUrl
        ];
      });

      $mainPrefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')
                                          ->whereIn('en_name', ['tokyo', 'kanagawa', 'saitama', 'chiba'])
                                          ->get();

      $data1 = compact('prefectureData', 'facilityData', 'tokyoCityData', 'otherCityData', 'mainPrefectureData');

      return view('mypage.draft', $data1);
    }

    public function getReview() {
      $prefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
      $facilityData = Facility::select('id', 'name')->get();

      $tokyoCityData = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
                          ->where('tbl_prefecture_region.name', 'like', '%東京%')
                          ->where('tbl_city_region.flag', 1)
                          ->select('tbl_city_region.id', 'tbl_city_region.name', 'tbl_prefecture_region.id as p_id')
                          ->get();

      $majorCity = DB::table('tbl_majorcity')->get();

      $otherCityData = $majorCity->map(function($item){
        $city_ids = DB::table('tbl_city_region')->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
                      ->where('tbl_city_region.name', 'like', '%'.$item->name.'%')
                      ->select('tbl_city_region.id', 'tbl_prefecture_region.id as p_id')
                      ->get();
        $partUrl = '';
        $len = count($city_ids);
        for($i=0;$i<$len;$i++) {
          $partUrl.='city_ids[]='.$city_ids[$i]->id;
          if($i < $len-1) $partUrl.='&';
        }

        return [
          'id' => $item->id,
          'p_id' => $city_ids[0]->p_id,
          'name' => $item->name,
          'cityUrl' => $partUrl
        ];
      });

      $mainPrefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')
                                          ->whereIn('en_name', ['tokyo', 'kanagawa', 'saitama', 'chiba'])
                                          ->get();

      $user = Auth::user();
      $result = Nursery::join('tbl_nursery_facility', 'tbl_nursery.id', '=', 'tbl_nursery_facility.nursery_id')
                        ->join('tbl_facility', 'tbl_facility.id', '=', 'tbl_nursery_facility.facility_id')
                        ->join('tbl_cooperate', 'tbl_nursery.cooperate_id', '=', 'tbl_cooperate.id')
                        ->join('tbl_city_region', 'tbl_nursery.city_id', '=', 'tbl_city_region.id')
                        ->join('tbl_prefecture_region', 'tbl_city_region.prefecture_id', '=', 'tbl_prefecture_region.id')
                        ->select('tbl_nursery.*', 'tbl_prefecture_region.name as prefecture_name', 'tbl_cooperate.name as cooperate_name', 'tbl_city_region.name as city_name', 'tbl_facility.name as facility_name', 'tbl_nursery_facility.facility_id')
                        ->get();
              
      $grouped = $result->groupBy('id')->map(function ($item) {
        $first = $item->first();
        $nursery = $first->toArray();
        $nursery['facility_id'] = $item->pluck('facility_id')->toArray();
        $nursery['facility_name'] = $item->pluck('facility_name')->toArray();
        return $nursery;
      });
      $statistics = DB::table('tbl_review_relation')->join('tbl_review', 'tbl_review.review_id', '=', 'tbl_review_relation.id')
                                  ->groupBy('nursery_id', 'user_id')
                                  ->where('tbl_review_relation.user_id', $user['id'])
                                  ->select('tbl_review_relation.nursery_id', DB::raw('count(*) as review_count'))
                                  ->get();
      $merged = $statistics->map(function ($item) use ($grouped) {
        $id = $item->nursery_id;
        $groupedItem = $grouped->where('id', $id)->first();
        
        return [
            'id' => $id,
            'name' => $groupedItem['name'],
            'cooperate_name' => $groupedItem['cooperate_name'],
            'address' => $groupedItem['prefecture_name'].$groupedItem['city_name'],
            'facility_id' => $groupedItem['facility_id'],
            'facility_name' => $groupedItem['facility_name'],
            'review_count' => $item->review_count
        ];
      });
      $postData = $merged->take(min(3, count($merged)));

      // print_r($postData);

      $data1 = compact('prefectureData', 'facilityData', 'tokyoCityData', 'otherCityData', 'mainPrefectureData', 'postData');
      return view('mypage.review', $data1);
    }

    public function getQuiet() {
      return view('mypage.quiet');
    }    

    public function getUser() {
      return view('mypage.user.index');
    }    
    public function getUseremail() {
      $result = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->get();
      if(count($result) == 0){
        for($i = 1;$i<=3;$i++)
          DB::table('tbl_email_delivery')->insert(['user_id' => Auth::user()->id, 'setting_id' => $i, 'checked' => 1]);
      }

      $result1 = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 1)->get('checked');
      $result2 = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 2)->get('checked');
      $result3 = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 3)->get('checked');
      
      // print_r($result3);
      return view('mypage.user.email', compact('result1', 'result2', 'result3'));
    }    
    public function getUserpassword() {
      return view('mypage.user.password');
    }    

    public function followNursery(Request $request) {
      $nursery_id = $request->input('nursery_id');
      if (Auth::check()) {
        $user = Auth::user();
        $result = DB::table('tbl_nursery_follow')->where('nursery_id', $nursery_id)->where('user_id', $user['id'])->get();
        if(count($result)>0) {
          $deleted_id = DB::table('tbl_nursery_follow')->where('nursery_id', $nursery_id)->where('user_id', $user['id'])->delete();
        }
        else {
          $id = DB::table('tbl_nursery_follow')->insert(['user_id' => $user['id'], 'nursery_id' => $nursery_id]);
        }
      }
    }

    public function likeReview(Request $request) {

      $review_id = $request->input('review_id');
      if (Auth::check()) {
        $user = Auth::user();
        $result = DB::table('tbl_review_like')->where('review_id', $review_id)->where('user_id', $user['id'])->get();
        if(count($result)>0) {
          $deleted_id = DB::table('tbl_review_like')->where('review_id', $review_id)->where('user_id', $user['id'])->delete();
        }
        else {
          $id = DB::table('tbl_review_like')->insert(['user_id' => $user['id'], 'review_id' => $review_id]);
          print_r($id);
        }
      }
    }

    public function getSurvey(Request $request) {
      if(Auth::check()) return view('mypage.withdrawal');
    }

    public function removeUser(Request $request) {
      // if(Auth::check()) {
        $data = $request->all();
        // foreach ($data['withdrawal_answers'] as $reason_id) {
        //   DB::table('tbl_remove_reason')->insert([
        //       'user_id' => Auth::user()->id,
        //       'remove_reason' => $reason_id
        //   ]);
        // }
        // Auth::user()->fill(['password' => Hash::make($request->password)])->save();
        $updated = Auth::user()->fill(['removed' => 1])->save();

        print_r($updated);

        // if($updated) return redirect('/logout');
      }
    // }
}