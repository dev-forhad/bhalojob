<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Helpers\MiscHelper;
use App\User;
use App\Company;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Helpers\DataArrayHelper;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use ImgUploader;
use Auth;
use DB;
use App\ProfileSummary;
use App\ProfileLanguage;
use App\Language;
class RegistrationController extends Controller
{
        use AuthenticatesUsers;
    public $agent;
   function __construct(Request $request)
   {
      date_default_timezone_set("Asia/Dhaka");
      $this->agent = new \Jenssegers\Agent\Agent;
      
   }
    protected function checkCodeValidity($user, $addMin = 2)
    {
        if (!$user->verification_token_at) {
            return false;
        }
        if ($user->verification_token_at->addMinutes($addMin) < Carbon::now()) {
            return false;
        }
        return true;
    }
   public function test(){
      if ($this->agent->isMobile()) {
            return view('auth.register2');
      }
   }
   public function termsandconditon(){
       return view('candidate.terms');
   }
   public function loginsingup(){
        // if ($this->agent->isMobile()) {
            return view('candidate.login-signup');
        // }
   }
   public function employeeReg(){
       return view('employee.register');
   }
   public function employerlogin(){
       if ($this->agent->isMobile()) {
            return view('company.employer-login');
        }else{
            return redirect()->route('login');
        }
   }
   
   public function employeedetails(){
       return view('employee.details');
   }
   public function profile(){
       return view('candidate.register-profile');
   }
   
  //  Candidate Registration
   public function authorizationform(){
    //   $email = request()->session()->get('email');
    // $email = 'aklima@bhalojob.com';
    //   dd($email);
    //   $code = verificationCode(6);
       
       
       return view('auth.2fa');
   }
   public function postauthorizationform(Request $request){
    $userid = session()->get('user_id');
    $user = User::find($userid);
    if ($user->verification_token == $request->code) {
            
            $user->verification_token = null;
            $user->verification_token_at = null;
            $user->save();
            return redirect()->route('changeapssword');
        }
   }
   
   
   
   
   public function sendVerifyCode(){
       $userid = session()->get('user_id');
       $user = User::find($userid);
       if ($this->checkCodeValidity($user)) {
            $targetTime = $user->verification_token_at->addMinutes(2)->timestamp;
            $delay = $targetTime - time();
            throw ValidationException::withMessages(['resend' => 'Please try after ' . $delay . ' seconds']);
        }
        $user->verification_token = $code = verificationCode(6);
        $user->verification_token_at = Carbon::now();
        $user->save();
        $email = $user->email;
         Mail::to($email)->send(new VerificationCodeMail($code));
         return back()->with('success', 'Verification Code sent.Please check again');
   }
   
   
   
   
   // Candidate Change Password
   public function changeapssword(){
       return view('candidate.passwordsetting');
   }
   public function postPassword(Request $request){
       $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
       $userid = session()->get('user_id');
       $user = User::find($userid);
       $user->password = bcrypt($request->input('password'));
       $user->save();
       $this->guard()->login($user);
    //   return redirect()->route('profilepage');
        return redirect()->route('home');
   }
   
   
   
   
   
}
