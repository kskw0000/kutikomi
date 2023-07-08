<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail; 
use App\Models\PrefectureRegion;
use App\Models\Facility;
  
use App\Models\Qual_User;

use App\Models\City;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function login()
    {
        if(Auth::check()){
            return redirect()->intended('/');
        }

        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        if(Auth::check()){            
            return redirect()->intended('/');
        }
        $prefectureData  = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
        $cityData  = City::select('id', 'name', 'prefecture_id')->get();

        $data1 = compact('prefectureData','cityData');
        
        return view('auth.registration',$data1);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user['role_id'] == 1) {
                if($user['status'] == 1){
                    session()->put('user', [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'is_admin' => $user->role_id
                    ]);
                    return redirect()->intended('/admin/home')
                                ->withSuccess('You have Successfully loggedin');    
                }
                else
                    return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
            }
            else if($user['role_id'] == 2){
                error_log("hi: email=" . $request->input('email') . ", password=" . $request->input('password'));
                if($user['status'] == 1){
                    error_log("hello: email=" . $request->input('email') . ", password=" . $request->input('password'));
                    session()->put('user', [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'is_admin' => $user->role_id
                    ]);

                    return redirect()->intended('/')
                                ->withSuccess('You have Successfully loggedin');    
                }
                else
                    return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
            }
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // 'postcode' => 'required|min:7',
            // 'password' => 'required|min:8',
        ]);
           
        $data = $request->all();

        // print_r('confirmed ok');
        if(isset($data['confirmed'])){
            $email = $data['email'];
            $createUser = $this->create($data);
      
            $token = Str::random(64);
      
            UserVerify::create([
                  'user_id' => $createUser->id, 
                  'token' => $token
                ]);
      
<<<<<<< HEAD
            Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
                  $message->to($request->email);
                  $message->subject('Email Verification Mail');
              });
=======
            // Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
            //       $message->to($request->email);
            //       $message->subject('Email Verification Mail');
            //   });
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc

            return redirect("complete")->with('data2', $email);            
        }
        else {
            $prefectureData  = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
            $cityData  = City::select('id', 'name', 'prefecture_id')->get();
            $qualificationData  = DB::table('tbl_qualification')->select('id', 'name')->get();
    
            $data1 = compact('prefectureData','cityData', 'qualificationData', 'data');

            return redirect('confirm')->with('data1', $data1);
        }

    }

    public function postConfirm(Request $request) {
        $data1 = session()->get('data1');

<<<<<<< HEAD
        if($data1)  return view('auth.confirm', $data1);
        else return view('auth.login');
=======
        return view('auth.confirm', $data1);
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
    }
    
    public function postComplete(Request $request) {
        $data2 = session()->get('data2');
<<<<<<< HEAD

        if($data2) return view('auth.complete', compact('data2'));
        else return view('auth.login');
=======
        return view('auth.complete', compact('data2'));
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        // if(Auth::check()){
        //     return view('home');
        // }
  
        // return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);

        $birthYear = $data['birthday_year'];
        $birthMonth = str_pad($data['birthday_month'], 2, '0', STR_PAD_LEFT);
        $birthDay = str_pad($data['birthday_day'], 2, '0', STR_PAD_LEFT);
        $birthdate = $birthYear . "-" . $birthMonth . "-" . $birthDay;

        $qualifications = [];
        foreach ($data['qualifications'] as $qualification) {
            $qualifications[] = $qualification;
        }
        
        // $data['qualifications'] = $qualifications;
        $createUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birth' => $birthdate,
            'prefecture_id' => $data['prefecture_id'],
            'city_id' => $data['city_id'],
<<<<<<< HEAD
            'role_id' => 2,
=======
            'is_email_verified' => 1
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
        ]);

        foreach ($data['qualifications'] as $qualification) {
            Qual_User::create([
                'user' => $createUser->id,
                'qualification_id' => $qualification
            ]);            
        }
        for($i = 1; $i<=3;$i++)
        {
            DB::table('tbl_email_delivery')->insert(['user_id' => $createUser->id, 'setting_id' => $i, 'checked' => 1]);
        }
        return $createUser;
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
<<<<<<< HEAD
            error_log($user);
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->status = 1;
=======
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
<<<<<<< HEAD

        if(Auth::check()){

            $user = Auth::user();
            if($user->role_id == 1) 
                return redirect('/admin/home')->with('message', $message);
        }
=======
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
  
      return redirect()->route('login')->with('message', $message);
    }

    public function changePassword(Request $request) {
            // $user = Auth::user();
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);

            if(Hash::check($request->old_password, Auth::user()->password)){
                Auth::user()->fill(['password' => Hash::make($request->password)])->save();
                return view('mypage.complete');
            }
            // else return back()->with('message', 'You input your current password correctly.!');
    }

    public function completePassword(Request $request) {
        // return view();
    }

    public function changeEmailSettings(Request $request) {
        // print_r($request->all());
        if(isset($request->is_new_reviews)) $result = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 1)->update(['checked'=> 1]);
        else $result = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 1)->update(['checked'=> 0]);
        if(isset($request->is_mail_notification)) $result = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 2)->update(['checked'=> 1]);
        else $result = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 2)->update(['checked'=> 0]);
        if(isset($request->is_delivery_content)) $result = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 3)->update(['checked'=> 1]);
        else $result = DB::table('tbl_email_delivery')->where('user_id', Auth::user()->id)->where('setting_id', 3)->update(['checked'=> 0]);
        return view('mypage.emailcomplete');
    }

    public function getPrefectureRegions(){
        $prefectureData = PrefectureRegion::select('id','main_id', 'name', 'en_name')->get();
        $data = compact('prefectureData');
        return response()->json($data);
      }
  
    public function getCitiesByPrefectureID(Request $request)
    {
        // $cities = City::where('prefecture_id', $prefectureId)->get();
        // $data = compact('cities');
        // return response()->json($data);
        $prefecture_id = $request->input('prefecture_id');
        $cities = City::select('id', 'name','prefecture_id')
                ->where('prefecture_id', $prefecture_id)
                ->get();

        return response()->json($cities);
    }
}