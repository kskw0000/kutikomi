<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $reviews = DB::table('tbl_review_relation')
                  ->join('users', 'users.id', '=', 'tbl_review_relation.user_id')
                  ->join('tbl_nursery', 'tbl_nursery.id', '=', 'tbl_review_relation.nursery_id')
                  ->select('tbl_review_relation.id', 'tbl_nursery.name as nursery_name', 'users.name as user_name', 'tbl_review_relation.status')
                  ->paginate(10);
      
        return view('admin.review.index', compact('reviews'));
    }
    
    public function updateStatus($review_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'review_id'   => $review_id,
            'status'    => $status
        ], [
            'review_id'   =>  'required|exists:tbl_review_relation,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('admin.review.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            DB::table('tbl_review_relation')->whereId($review_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('admin.review.index')->with('success','Review Status Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function edit($review)
    {
      $reviews =  DB::table('tbl_review_relation')
                    ->join('tbl_review', 'tbl_review_relation.id', '=', 'tbl_review.review_id')
                    ->join('users', 'tbl_review_relation.user_id', '=', 'users.id')
                    ->join('tbl_nursery', 'tbl_nursery.id', '=', 'tbl_review_relation.nursery_id')
                    ->where('tbl_review_relation.id', $review)
                    ->select('tbl_review.*', 'users.name as user_name', 'tbl_nursery.name as nursery_name')
                    ->get();

        return view('admin.review.edit')->with([
            'reviews' => $reviews
        ]);
    }

    public function delete($review)
    {
        DB::beginTransaction();
        try {
            // Delete User
            DB::table('tbl_review_relation')->whereId($review)->delete();

            DB::commit();
            return redirect()->route('admin.review.index')->with('success', 'Review Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
