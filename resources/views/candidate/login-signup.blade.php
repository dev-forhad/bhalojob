@extends('layouts.app')

@push('styles')
<link href="{{asset('css/mobile_style.css')}}" rel="stylesheet"
        type="text/css">

<style>
   
    .useraccountwrap{
        min-height: 80vh;
        position:relative;
    }
    .copyright{
        /*position: absolute;*/
        /*bottom: 0;*/
            /*background: transparent;*/
    }
    .copyright p{
        font-size:12px;margin-bottom: 0;color: #000;line-height: 16px;
    }
   .copyright{
       position: relative;
   }
   #login-candidate-password-hide{
    display: none;
   }
</style>
@endpush
@section('content')

<!-- Header start -->

<!-- Header end -->



<div class="authpages my-4">

    <div class="container">
        <div class="row ">
           <div class="col-md-12 text-center mt-3">
               <div class="language-toggle" role="group" aria-label="Language Selector">
                    <input type="radio" id="jpRadio" name="language" value="jp">
                    <label for="jpRadio">JP</label>
                
                    <input type="radio" id="enRadio" name="language" value="en" checked>
                    <label for="enRadio">EN</label>
                
                    <!--<input type="radio" id="bnRadio" name="language" value="bn">-->
                    <!--<label for="bnRadio">BN</label>-->
                  </div>
           </div>
       </div>
       <div class="row justify-content-center">
            <div class="col-lg-6">
            @include('flash::message')
    
    
    
                <div class="useraccountwrapcontent bg-transparent">
                    <!--<div class="row">-->
                        <!--<div class="col-md-6">-->
                            
                            <div class="userbtns pt-4">
                                
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ @$siteSetting->site_logo }}" alt="{{ @$siteSetting->site_name }}" /></a>
                                </div>
                           </div>
                        <!--</div>-->
                    <!--</div>-->
                            
                   <div class="user_main_container row">
                       <div class="col-md-12 p-3">
                       <h1 class="text-center mb-4">Candidate Registration</h1>
                       

                    <div class="social-loginc">
                        <div class="icon mb-2">
                                    <a href="https://demo.bhalojob.com/login/jobseeker/facebook" class="fb">
                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                        <span>Register with Facebook </span>
                                    </a>
                                </div>
                                <div class="icon mb-2">
                                    <a href="https://demo.bhalojob.com/login/jobseeker/google" class="gp">
                                        <i class="fab fa-google" aria-hidden="true"></i>
                                        <span>Register with Google </span>
                                    </a>
                                </div>
                               
                                <!-- <div class="icon">
                                <a href="#" class="tw">
                                    <i class="fab fa-yahoo" aria-hidden="true"></i>
                                    <span> Yahoo </span>
                                </a>
                                </div>-->
                                <div class="icon mb-2">
                                    <a href="#" class="tw">
                                        <i class="fab fa-linkedin" aria-hidden="true"></i>
                                        <span>Register with Linkedin </span>
                                    </a>
                                </div>
                    </div>
                    <hr>
                    <div class="register_with_email formpanel2">
                        <article class="text-center mb-2 text-danger fw-bold">
                            <p> Register with your email address </p>
                         </article>
                        <form action="{{ route('register') }}" class="form-horizontal" method="POST" >
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email"> <i class="fa fa-envelope" aria-hidden="true"></i> </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="email" aria-label="Username" aria-describedby="email">
                                
                                
                                
                            </div>
                            @if ($errors->has('email')) <span class="help-block text-danger mb-2 d-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif 
                            <div class="submit-button">
                                <input type="submit" class="btn" value="Submit">
                             </div>
                        </form>
                    </div>
                    <hr>
                    <div class="loginwith formpanel2">
                        <form action="{{ route('login') }}" class="form-horizontal " method="POST" >
                     {{ csrf_field() }}

                 <article class="text-center mb-2 text-danger fw-bold">
                    <p> Login with your email address </p>
                 </article>


                     <input type="hidden" name="candidate_or_employer" value="candidate" />



                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="email"> <i class="fa fa-envelope" aria-hidden="true"></i> </span>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="email" aria-label="Username" aria-describedby="email">
                            
                            
                        </div>
                         @if ($errors->has('email')) <span class="help-block text-danger mb-2 d-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif 



                        <!--<div class="input-group mb-3">-->
                        <!--    <div class="input-group-prepend">-->
                        <!--        <span class="input-group-text" > <i class="fa fa-unlock-alt" aria-hidden="true"></i> </span>-->
                        <!--    </div>-->
                        <!--    <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}"  required="required" aria-label="Username" aria-describedby="{{__('Password')}}" value="">-->

                        <!--</div>-->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <i class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
                            </div>

                            <!--<div class="d-flex">-->
                                <input type="password" name="password" class="form-control border-right-0" id="login-candidate-password" placeholder="{{_('Password')}}"  required="required" aria-label="Username" aria-describedby="{{_('Password')}}" value="">
                               <div class="input-group-append ">
                                <span class="eye pb-2 input-group-text border-left-0" style="background:#e8f0fe">
                                    <i
                                    class="fa-regular fa-eye"
                                    onclick="passwordShowHideHundler('show')"
                                    id="login-candidate-password-show"
                                    ></i>
                                    <i
                                    class="fa-regular fa-eye-slash"
                                    onclick="passwordShowHideHundler('hide')"
                                    id="login-candidate-password-hide"
                                    ></i>
                                    </span>
                                    
                                </div>
                            </div>

                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="form-group text-left">
                             <input type="checkbox" name="" id="">
                            <label for=""> Remember Me </label>
                        </div>
                        <div class="submit-button">
                           <button type="submit" class="btn">{{ __('Login Now') }} </button>
                        </div>
                        

                     
                 </form>
                    
                    </div>
                    <div class="col-md-12 p-3">
                    <div class="mb-3 text-center mt-3 text-danger fw-bold"><a href="{{ route('password.request') }}" class=
                    "forget_pass">{{ __('Forgot Your Password') }}?</a>
                    </div></div>


                 
                       </div>
                       <div class="col-md-12 p-0">
                           <div class="copyright bg-transparent">
                                <p>Copyright {{date('Y')}} @<span class="text-red">bhalojob.com</span></p>
                                <p>All rights Reserve</p>
                            </div>
                       </div>
                   </div>
                    
                </div>
                
            </div>
        </div>

        <!-- <div class="col-lg-7">
        <div class="loginpageimg"><img src="{{asset('/')}}images/login-page-banner.png" alt=""></div>
        </div> -->

       <!--</div>-->



    </div>

</div>


@endsection
@push('scripts')
<script>
    const passwordShowHideHundler = (data)=>{
        if (data == "show"){
            document.getElementById('login-candidate-password').type = "text"
            document.getElementById('login-candidate-password-hide').style.display = "block"
            document.getElementById('login-candidate-password-show').style.display = "none"
        } else {
            document.getElementById('login-candidate-password').type = "password"
            document.getElementById('login-candidate-password-hide').style.display = "none"
            document.getElementById('login-candidate-password-show').style.display = "block"
        }
    }
</script>
@endpush