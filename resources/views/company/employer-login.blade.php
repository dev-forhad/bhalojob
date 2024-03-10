@extends('layouts.app')

@section('content')

<!-- Header start -->


<!-- Header end -->

@push('styles')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endpush

<section class="col-12 m-auto">
        <div>
            <!-- nav header  -->
            <div class="col-md-12 py-2 text-center mt-3">
                <div
                    class="language-toggle"
                    role="group"
                    aria-label="Language Selector"
                >
                <input type="radio" id="jpRadio" name="language" value="jp" />
                <label for="jpRadio">JP</label>
        
                <input type="radio" id="enRadio" name="language" value="en" checked />
                <label for="enRadio">EN</label>
        
                <!--<input type="radio" id="bnRadio" name="language" value="bn" />-->
                <!--<label for="bnRadio">BN</label>-->
                </div>
            </div>

            <section class="py-4 d-flex align-content-center justify-content-center ">

                <section class="col-12 m-auto ">
                    <div class="w-100 row mt-5">
                         <a href="{{url('/')}}" class="col-10 d-block m-auto">
                             <img src="{{ asset('/') }}sitesetting_images/thumb/{{ @$siteSetting->site_logo }}" class="col-12 m-auto " alt="{{ @$siteSetting->site_name }}" />
                             </a>
                    </div>

                    <!-- form start here  -->
                    <form class="form-horizontal" method="POST" action="{{ route('company.login') }}">
                        @csrf
                        <input type="hidden" name="candidate_or_employer" value="employer" />
                        <div>
                            <div class="employ-login-single-box my-4">
                                <i class="fa-solid h5 pt-4 d-block fa-envelope"></i>
                                <input class="border-0 w-100 employ-login-border px-3 focus-none" id="email" name="email" type="email" placeholder="Your Email">
                                  
                            </div>
                            @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                            <div class="employ-login-single-box my-4 mb-0">
                                <i class="fa-solid h5 pt-4 fa-lock"></i>
                                <input class="border-0 w-100 employ-login-border px-3 focus-none" id="password" name="password" type="password" placeholder="Password">
                            </div>
                            @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                             <!--<div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">-->
                             <!--                   <input id="password" type="password" class="form-control"-->
                             <!--                       name="password" value="" required-->
                             <!--                       placeholder="{{ __('Password') }}">-->
                                                
                             <!--               </div>-->
                        </div>
                        <div class=" d-flex remember-me align-content-center ">
                        <input class="login-checkbox" type="checkbox" name="checkbox" id="checkbox">
                        <label class="px-2 pt-1 login-" for="checkbox login-checkbox">Remember me?.</label>
                    </div>
                        <div class="d-flex justify-content-center mb-2 mt-4 submit-button text-center">
                        <input type="submit" class="choose-cetagory-btn" value="Login Now">
                                  
                    </div>
                    </form>

                    


                    
                    

                    <div class="forget-password-a">
                        <a href="{{ route('company.password.request') }}">Forget your password??</a>
                    </div>

                    <div class="not-account-on-login d-flex ">
                        <p class="">Don’t you have account?</p>
                        <a class="d-block px-3 " href="{{url('employee-register')}}">Register here</a>
                    </div>


                    <div class="choose-cetagory-p pb-4">
                        <p>I hereby confirm that i read, understand and agreed to bhalojob and <a href="{{url('terms-&-condition')}}">Terms & Conditions</a> and <a href="/">Privacy Policy</a></p>
                    </div>
                </section>

            </section>

            
            <!-- footer  -->
            <div class="cetagory-footer">
                <p>Copyright 2024 @bhalojob.com</p>
                <p>All Rights Reserved</p>
            </div>
        </div>
    </section>
    


@endsection
@push('scripts')
@endpush