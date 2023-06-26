<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\City;
use App\Models\Prefecture;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CompanyController extends Controller
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
     * List User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $companies = Company::with(['city' => function($query) {
                        $query->select('id', 'name', 'prefecture_id');
                      }, 'city.prefecture:id,name'])->paginate(10);
        return view('admin.company.index', ['companies' => $companies]);
    }
    
    /**
     * Create User 
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function create()
    {
        $prefectures = Prefecture::select('id', 'name')->get();
       
        return view('admin.company.add', ['prefectures' => $prefectures]);
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'name'    => 'required|unique:tbl_cooperate,name',
            'address'         => 'required',
            'prefecture_id'       =>  'required',
            'city_id'       =>  'required',
            'postcode'      =>  'required'
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $user = Company::create([
                'name'    => $request->name,
                'address'         => $request->address,
                'prefecture_id'       => $request->prefecture_id,
                'city_id'        => $request->city_id,
                'postcode'      => $request->postcode,
            ]);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('admin.company.index')->with('success','Company Created Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($user_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'user_id'   => $user_id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:users,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('admin.users.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            User::whereId($user_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('admin.users.index')->with('success','User Status Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit($company)
    {
        $companyData = Company::with('city')->whereId($company)->first();
        $prefectures = Prefecture::select('id', 'name')->get();
        $cities = City::where('prefecture_id', $companyData->city->prefecture_id)->get();

        return view('admin.company.edit')->with([
            'company' => $companyData,
            'prefectures'  => $prefectures,
            'cities'    => $cities
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, $company)
    {
        // Validations
        $request->validate([
            'name'    => $request->name,
            'address'         => $request->address,
            'prefecture_id'       => $request->prefecture_id,
            'city_id'        => $request->city_id,
            'postcode'      => $request->postcode,
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $company_updated = Company::whereId($company)->update([
                'name'    => $request->name,
                'address'         => $request->address,
                'prefecture_id'       => $request->prefecture_id,
                'city_id'        => $request->city_id,
                'postcode'      => $request->postcode,    
            ]);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('admin.company.index')->with('success','Company Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function delete($company)
    {
        DB::beginTransaction();
        try {
            // Delete User
            Company::whereId($company)->delete();

            DB::commit();
            return redirect()->route('admin.company.index')->with('success', 'Company Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function getCities(Request $request) {
        $prefecture = $request->prefecture;

        $cities = City::where('prefecture_id', $prefecture)->select('id', 'name')->get();

        return response()->json($cities);
    }

}
