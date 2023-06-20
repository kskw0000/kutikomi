<?php
  
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Nursery;
use App\Models\PrefectureRegion;
use App\Models\Facility;
use App\Models\Qualification;
use Hash;
use Illuminate\Support\Str;
use Mail; 
  
class HomeController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
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
      if(Auth::check()){
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
        $result = $query->leftJoin('tbl_review_history', function ($join) use ($user) {
          $join->on('tbl_review_history.nursery_id', '=', 'tbl_nursery.id')
              ->where('tbl_review_history.user_id', '=', $user['id']);
        })->leftJoin('tbl_nursery_follow', function ($join) use ($user) {
          $join->on('tbl_nursery_follow.nursery_id', '=', 'tbl_nursery.id')
              ->where('tbl_nursery_follow.user_id', '=', $user['id']);
        })->select('tbl_review_history.id as history_id', 'tbl_nursery_follow.id as followed_id', 'tbl_nursery.*', 'tbl_prefecture_region.name as prefecture_name', 'tbl_cooperate.name as cooperate_name', 'tbl_city_region.name as city_name', 'tbl_facility.name as facility_name', 'tbl_nursery_facility.facility_id')->get();
                
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
        $history_count = 0;
        $merged = $grouped->map(function ($item) use ($statistics, &$history_count) {
          $id = $item['id'];
          $stat = $statistics->where('nursery_id', $id)->first();
          
          if($item['history_id']) $history_count++;
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
        $historyData = $merged->take(min(3, $history_count));        
        $data1 = compact('prefectureData', 'facilityData', 'tokyoCityData', 'otherCityData', 'mainPrefectureData', 'followedData', 'historyData');
      }

      return view('home', $data1)
        ->with('title', 'Home');
    }

    public function getPrefectureRegions(){
      $prefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
      $data = compact('prefectureData');
      return response()->json($data);
    }

    public function getFacilities(){
      $facilityData = Facility::select('id', 'name')->get();
      $data = compact('facilityData');
      return response()->json($data);
    }

    public function getQualifications(){
      $qualificationData = Qualification::select('id', 'name')->get();
      $data = compact('qualificationData');
      return response()->json($data);
    }

    public function getTerms() {
      return view('terms');
    }

    public function getSitemap() {
      return view('sitemap');
    }

    public function getPolicy() {
      return view('policy');
    }

    public function getScore() {
      return view('score');
    }

    public function getGuide() {
      return view('guide');
    }

    public function getHelp() {
      return view('help');
    }    

    public function getHelpContact1() {
      return view('help.contact1');
    }
    public function getHelpContact2() {
      return view('help.contact2');
    }

    public function postHelpContact(Request $request) {
      $data = $request->all();
      $result = DB::table('tbl_faq')->insert(['query_type'=> $data['query_type'], 'contact_type' => $data['contact_type'], 'name' => $data['name'], 'cooperate_name' => isset($data['nursery_name'])?$data['nursery_name']:"", 'email' => $data['email'], 'content' => $data['content']]);
      if($result) return view('help.complete');
    }

    public function addNewNursery(Request $request) {
      $data = $request->all();
      $request->validate([
          'prefecture_id' => 'required',
          'city_id' => 'required',
          'nursery_name' => 'required',
          'url' => 'required'
      ]);

      $id = DB::table('tbl_new_nursery')->insert(['name' => $data['nursery_name'], 'prefecture_id' => $data['prefecture_id'], 'city_id' => $data['city_id'], 'site_url' => $data['url']]);
      if($id) return back()->with('success', 'New nursery is inserted successfully.');
    }
}