<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Nursery;
use App\Models\Facility;
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

class NurseryController extends Controller
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
        $nurseries = Nursery::with(['city' => function($query) {
                        $query->select('id', 'name', 'prefecture_id');
                      }, 'city.prefecture:id,name', 'company:id,name', 'facility'])->paginate(10);
        return view('admin.nursery.index', ['nurseries' => $nurseries]);
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
        $companies = Company::select('id', 'name')->get();
        $facilities = Facility::select('id', 'name')->get();
       
        return view('admin.nursery.add', ['prefectures' => $prefectures, 'companies' => $companies, 'facilities' => $facilities]);
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|unique:tbl_nursery,name',
            'address'         => 'required',
            'prefecture_id'       =>  'required',
            'city_id'       =>  'required',
            'cooperate_id'       =>  'required',
            'facility'      =>  'required'
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $nursery = Nursery::create([
                'name'    => $request->name,
                'address'         => $request->address,
                'prefecture_id'       => $request->prefecture_id,
                'city_id'        => $request->city_id,
                'cooperate_id'        => $request->cooperate_id,
            ]);
            $nursery->facility()->sync($request->facility);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('admin.nursery.index')->with('success','Nursery Created Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit($nursery)
    {
        $nurseryData = Nursery::with(['city' => function($query) {
            $query->select('id', 'name', 'prefecture_id');
          }, 'city.prefecture:id,name', 'company:id,name', 'facility:id,name'])->whereId($nursery)->first();
        $prefectures = Prefecture::select('id', 'name')->get();
        $facilities = Facility::select('id', 'name')->get();
        $companies = Company::select('id', 'name')->get();
        $cities = City::where('prefecture_id', $nurseryData->city->prefecture_id)->get();

        return view('admin.nursery.edit')->with([
            'nursery' => $nurseryData,
            'prefectures'  => $prefectures,
            'cities'    => $cities,
            'companies' => $companies,
            'facilities'  => $facilities,
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, $nursery)
    {
        // Validations
        // $request->validate([
        //     'name'    => $request->name,
        //     'address'         => $request->address,
        //     'city_id'        => $request->city_id,
        //     'cooperate_id'      => $request->cooperate_id,
        //     'facility' => $request->facility,
        // ]);

        DB::beginTransaction();
        try {

            // Store Data
            $nursery_updated = Nursery::findOrFail($nursery);
            $nursery_updated->update([
                'name'    => $request->name,
                'address'         => $request->address,
                'city_id'        => $request->city_id,
                'cooperate_id'      => $request->cooperate_id,    
            ]);

            $nursery_updated->facility()->sync($request->facility);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('admin.nursery.index')->with('success','Nursery Updated Successfully.');

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
    public function delete($nursery)
    {
        DB::beginTransaction();
        try {
            // Delete User
            Nursery::whereId($nursery)->delete();

            DB::commit();
            return redirect()->route('admin.nursery.index')->with('success', 'Nursery Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
