<?php

namespace App\Http\Controllers\Company\Auth;

use Auth;
use App\Company;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use App\Http\Requests\Front\CompanyFrontRegisterFormRequest;
use Illuminate\Auth\Events\Registered;
use App\Events\CompanyRegistered;
use Illuminate\Support\Str;
use Carbon\Carbon;
use session;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Helpers\MiscHelper;

class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/company-home';
    protected $userTable = 'companies';
    protected $redirectIfVerified = '/company-home';
    protected $redirectAfterVerification = '/company-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company.guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company');
    }
// public function register(CompanyFrontRegisterFormRequest $request)
    public function register(Request $request)
    {
        // dd($request);
       // echo '<pre>'; print_r($request->all()); exit();
       $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'last_name' => 'required',
            'first_name' => 'required',
            'name' => 'required',
            'state_id' => 'required',
            'designation' => 'required',
            'phone' => 'required',
        ]);
         $email = $request->input('email');
       
        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $email;
        // $company->password = bcrypt($request->input('password'));
        $company->last_name = $request->input('last_name');
        $company->first_name = $request->input('first_name');
        $company->state_id = $request->input('state_id');
        $company->designation = $request->input('designation');
        $company->phone = $request->input('phone');
        
        $company->verification_token = $code = verificationCode(6);
        $company->verification_token_at = Carbon::now();
        $company->is_active = 0;
        $company->verified = 0;
        $company->save();
        
        /*         * ******************** */
        $company->slug = Str::slug($company->name, '-') . '-' . $company->id;
        $company->update();
        
        request()->session()->put('emailed', $email);
        session()->put('employer_id', $company->id);
         Mail::to($email)->send(new VerificationCodeMail($code));
        return redirect()->route('employeerAuthorize');
        
        /*         * ******************** */

        //event(new Registered($company));
       // event(new CompanyRegistered($company));
        // $this->guard()->login($company);
       // UserVerification::generate($company);
        //UserVerification::send($company, 'Company Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
        // return $this->registered($request, $company) ?: redirect($this->redirectPath());
    }
    
   //  Employeer Registration
   public function employeerAuthorizationForm(){
       
       return view('company.2step_verification');
   }
   public function postEmployeerAuthorizationForm(Request $request){
        $employer_id = session()->get('employer_id');
        $employer = Company::find($employer_id);
        if ($employer->verification_token == $request->code) {
                
            $employer->verification_token = null;
            $employer->verification_token_at = null;
            $employer->save();
            return redirect()->route('employeerSetPassword');
        }
        else{
           return back()->with('success', 'Code is not matching');
        }
      }
       // Employer Change Password
       public function employeersetPassword(){
           return view('company.newpasswordset');
       }
        public function passwordSave(Request $request){
           
           $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
           $employer_id = session()->get('employer_id');
           
           $company = Company::find($employer_id);
        //   dd($company);
         
           $company->password = bcrypt($request->input('password'));
           $company->save();
          $this->guard()->login($company);
            return redirect()->route('company.home');
       }

}
