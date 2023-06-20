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
        return view('answer', compact('schools'));
    }
    public function store(Request $request)
    {

        error_log('mark ===> '. json_encode($request->input('mark')));

        $data = $request->all();
        $review = json_decode($request->input('review'));

        $save_relation = [
            "nursery_id" => $data['index'][0],
            "user_id" => $data['user'],
            "status" => 'approved',
        ];

        $res_relation = ReviewRelation::create($save_relation);
        error_log("mark ===> ".json_encode($res_relation));

        $rate=0;
        if($data['mark'][0]==0)
            $rate=1;
        if($data['mark'][0]==1)
            $rate=2;
        if($data['mark'][0]==2)
            $rate=2.5;
        if($data['mark'][0]==3)
            $rate=3.5;
        if($data['mark'][0]==4)
            $rate=4.5;
        if($data['mark'][0]==5)
            $rate=5;

        for($i=0;$i<8;$i++)
        if($review[$i] != "")
        {
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
    }
    public function answer()
    {
        $preinput = null;
        $schools = $this->searchnursery();
        return view('answer', compact('schools', 'preinput'));
    }

    public function searchnursery()
    {
        $data = DB::table('tbl_nursery')
                ->select('name')
                ->get();

        $arrayData = $data->map(function($item){
            return $item->name;
        });

        return $arrayData;
    }

    public function showschoolById($id) {
      
        $res = DB::table('tbl_nursery')
                  ->select('tbl_nursery.id', 'tbl_nursery.name')
                  ->where('tbl_nursery.id', $id)
                  ->get();
        $preinput = $res[0];

        $schools = $this->searchnursery();
        return view('answer', compact('schools','preinput'));
    }
    
}
