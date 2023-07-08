<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\PrefectureRegion;
use App\Models\City;
use App\Models\Qual_User;
use App\Models\Users;
use App\Models\Review;
use App\Models\ReviewRelation;

class AnswerController extends Controller
{
    public function index()
    {
        $data = $this->searchnursery()->get();
        $schools = $this->searchnursery();
        // print_r($schools)
        return view('answer', compact('schools'));
    }
    public function store(Request $request)
    {

        error_log('mark ===> '. json_encode($request->input('mark')));

        $data = $request->all();
        $review = json_decode($request->input('review'));

        $user = Auth::user();

        error_log($user);
        // if(Auth::check()) {
            error_log('markRRS ===> '. json_encode($request->input('mark')));

            // $user = Auth::user();

            $save_relation = [
                "nursery_id" => $data['nursery_id'],
                "user_id" => $data['user'],
                "status" => 1,
            ];
    
            $res_relation = ReviewRelation::create($save_relation);
            error_log("mark ===> ".json_encode($res_relation));
    
//           error_log("mark ===> ".));    
            // print_r($rate);
            for($i=0;$i<8;$i++)
            if($review[$i] != "")
            {
                $rate=0; 
                if($data['mark'][$i]==0)
                    $rate=1;
                if($data['mark'][$i]==1)
                    $rate=2;
                if($data['mark'][$i]==2)
                    $rate=2.5;
                if($data['mark'][$i]==3)
                    $rate=3.5;
                if($data['mark'][$i]==4)
                    $rate=4.5;
                if($data['mark'][$i]==5)
                    $rate=5;
    
            $save = [
                "employment" => $data['index'][1]+1,
                "experience" => $data['index'][2]+1,
                "workperiod" => $data['index'][3]+1,
                "workhour" => $data['index'][4]+1,
                "rating" => $rate,
                "review_type" => $i+1,
                "content" => $review[$i],
                "review_id" => $res_relation->id,
            ];
            $res = Review::create($save);
    
            }
            error_log("mark ===> ".json_encode($save));
    
    
            return response()->json([
                'data'=> $res
            ]);
        // }
    }

    public function answer()
    {
        $preinput = null;
        $schools = $this->searchnursery();
<<<<<<< HEAD
        $me_id=-1;
        return view('answer', compact('schools', 'preinput','me_id'));
=======
        return view('answer', compact('schools', 'preinput'));
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
    }

    public function searchnursery()
    {
        $data = DB::table('tbl_nursery')
<<<<<<< HEAD
                ->select('name', 'id')
                ->get();

        // $arrayData = $data->map(function($item){
        //     return $item->name;
        // });

        return $data;
=======
                ->select('name')
                ->get();

        $arrayData = $data->map(function($item){
            return $item->name;
        });

        return $arrayData;
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
    }

    public function showschoolById($id) {
      
        $res = DB::table('tbl_nursery')
                  ->select('tbl_nursery.id', 'tbl_nursery.name')
                  ->where('tbl_nursery.id', $id)
                  ->get();
        $preinput = $res[0];
<<<<<<< HEAD
        $me_id=$id;
        $schools = $this->searchnursery();
        return view('answer', compact('schools','preinput','me_id'));
=======

        $schools = $this->searchnursery();
        return view('answer', compact('schools','preinput'));
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
    }
    
}
