<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use App\Http\Requests\Front\UserFrontRegisterFormRequest;
use Illuminate\Auth\Events\Registered;
use App\Events\UserRegistered;
use session;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Helpers\MiscHelper;
use Carbon\Carbon;
class RegisterController extends Controller
{
     public $agent;
   
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
        date_default_timezone_set("Asia/Dhaka");
        $this->agent = new \Jenssegers\Agent\Agent;
    }
    
    public function showRegistrationForm(){
        if ($this->agent->isMobile()) {
                return view('auth.register2');
         }else{
             return view('auth.register');
         }
        //  return view('auth.register2');
         
    }
    

    public function register(Request $request)
    { 
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $email = $request->input('email');
        // $email = 'aklima@bhalojob.com';
        
        $user = new User();
        // $user->first_name = $request->input('first_name');
        // $user->middle_name = $request->input('middle_name');
        // $user->last_name = $request->input('last_name');
        $user->email = $email;
        $user->verification_token = $code = verificationCode(6);
        $user->verification_token_at = Carbon::now();
        // $user->password = bcrypt($request->input('password'));
        $user->is_active = 0;
        $user->verified = 0;
        $user->save();
        request()->session()->put('email', $email);
        session()->put('user_id', $user->id);
         Mail::to($email)->send(new VerificationCodeMail($code));
        return redirect()->route('authorize');
        
        // /*         * *********************** */
        // $user->name = $user->getName();
        // $user->update();
        
        /*         * *********************** */
       // event(new Registered($user));
       // event(new UserRegistered($user));
        $this->guard()->login($user);
       // UserVerification::generate($user);
       // UserVerification::send($user, 'User Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));

        //dd($this->redirectPath());
        // return $this->registered($request, $user) ?: redirect($this->redirectPath());

    }

}
