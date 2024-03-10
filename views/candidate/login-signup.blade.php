@extends('layouts.app')

@push('styles')
<style>
    .logo{
        /*margin-top: 150px;*/
        text-align: center;
        margin-bottom: 30px;
    }
    .userbtns{
        text-align:center;
    }
    p.cat{
        padding-bottom: 15px;color: #333;
    }
    .userbtns .nav-tabs>li{
        
        width: 80%;
    }
    .userbtns .nav-tabs{gap: 10px; }
    .terms{
        margin-top: 25px;
        font-size: 14px;
    }
    a.red-text{
        color: #DB3036;
        background: #F6C5C8;
        font-weight: 600;
    }
    .useraccountwrap{
        min-height: 100vh;
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
    .text-red{
        color: #DB3036;
    }
    .bg-less-red{
        background: #FBE9E9;
    }
    .bg-transparent{background:transparent;}
    .terms-content h3{
            font-size: 20px;
    margin: 10px 0;
    }
    .userbtns {
    display: flex;
    align-items: center; /* Center items vertically */
    padding: 10px; /* Add some padding for spacing */
}

.back_btn {
    margin-right: 10px; /* Adjust margin for spacing between the back button and the logo */
}

.logo {
    margin: 0 auto; /* Center the logo horizontally */
}

.logo img {
    max-height: 50px; /* Set a maximum height for the logo */
}
</style>
@endpush
@section('content')

<!-- Header start -->

<!-- Header end -->



<div class="authpages">

    <div class="container">

       <div class="row justify-content-center">
            <div class="col-lg-6">
            @include('flash::message')
    
    
    
                <div class="useraccountwrapcontent">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="userbtns">
                                
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ @$siteSetting->site_logo }}" alt="{{ @$siteSetting->site_name }}" /></a>
                                </div>
                           </div>
                        </div>
                    </div>
                            
                   <div class="user_main_container bg-less-red row">
                       <div class="col-md-12 p-3">
                       <h1 class="text-center mb-4">Candidate Registration</h1>
                       

                    <div class="social-login">
                        <div class="icon">
                        <a href="{{url('login/jobseeker/google')}}" class="bg-danger">
                            <i class="fab fa-google" aria-hidden="true"></i>
                            <span> Google </span>
                        </a>
                        </div>
                        <div class="icon">
                        <a href="{{ url('login/jobseeker/facebook') }}" class="fb">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <span> Facebook </span>
                        </a>
                        </div>
                        <!-- <div class="icon">
                        <a href="#" class="tw">
                            <i class="fab fa-yahoo" aria-hidden="true"></i>
                            <span> Yahoo </span>
                        </a>
                        </div> -->
                        <div class="icon">
                        <a href="#" class="tw">
                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                            <span> Linkedin </span>
                        </a>
                        </div>
                    </div>
                    <hr>
                    <div class="register_with_email formpanel">
                        <article>
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
                            <div class="submit-button">
                                <input type="submit" class="btn" value="Submit">
                             </div>
                        </form>
                    </div>
                    <hr>
                    <div class="loginwith formpanel">
                        <form action="{{ route('register') }}" class="form-horizontal " method="POST" >
                     {{ csrf_field() }}

                 <article>
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



                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" > <i class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}"  required="required" aria-label="Username" aria-describedby="{{__('Password')}}" value="">

                        </div>
                        <div class="form-group text-left">
                             <input type="checkbox" name="" id="">
                            <label for=""> Remember Me </label>
                        </div>
                        <div class="submit-button">
                           <input type="submit" class="btn" value="{{ __('Login Now') }}">
                        </div>
                        

                     
                 </form>
                    
                    </div>
                    <div class="mb-3"><i class="fas fa-lock" aria-hidden="true"></i><a href="{{ route('company.password.request') }}">{{ __('Forgot Your Password') }}?</a>
                    </div>


                 
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