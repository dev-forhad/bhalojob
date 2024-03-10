@extends('layouts.app')

@section('content')

<!-- Header start -->

@include('includes.header')

<!-- Header end -->

@push('styles')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endpush
<section class="v-code-main-box col-lg-8 col-12 m-auto px-0 ">
    <div class="varification-header varification-header-pc bg-none px-0">
        <h1>Password Setting</h1>
    </div>

    <div class="line-box d-none d-lg-flex">
        <div class="line-one"></div>
        <div class="line-two"></div>
        <div class="line-three"></div>
    </div>
    <div class="col-lg-10 m-auto">
        <div class="col-lg-10 m-auto">
          <p class="verificationn-p verificationn-p-pc text-center">
            If you are using iOS16.0, you may not be able to login properly,
            Please update your iOS to the latest version.
          </p>
        </div>
        
        <!-- start form  -->
        <form action="{{route('savepass')}}" method="post" class="col-10 m-auto">
        @csrf
         <div class="pt-3">
           <p class="set-apass-choose-ass">Please set a password</p>
         </div>
         
          <!-- for new password  -->
          <div>
            <label class="set-pass-label pb-0 mb-0" for="password">
            New password</label>
            
            <div class="employ-login-single-box pc-set-pass-label mt-0">
            <input 
            class="border-0 w-100 pt-2 employ-login-border px-3 focus-none" 
            id="password" 
            name="password" 
            type="password" 
            placeholder="New Password" 
            onkeyup="checkPassword() , matchPassword()" 
            required 
            />
            <span class="eye pb-2" onclick="showPass()">
            <i
            class="fa-regular fa-eye"
            onclick="showPasswordIcon()"
            id="password-show"
            ></i>
            <i
            class="fa-regular fa-eye-slash"
            onclick="hidePasswordIcon()"
            id="password-hide"
            ></i>
            </span>
            @if ($errors->has('password')) <span class="help-block text-danger mb-2 d-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif 
            </div>

                    <div>
                        <p id="passStatus"></p>
                        <div class="d-flex align-content-center" id="node-box">
                          <p class="check-pass px-1">Required</p>
                          <p class="check-pass px-1" id="w-0">Number,</p>
                          <p class="check-pass px-1" id="w-1">Mmall letter,</p>
                          <p class="check-pass px-1" id="w-2">Capital letter,</p>
                          <p class="check-pass px-1" id="w-3">Special character</p>
                        </div>
                        <div class="check-line-box">
                          <div class="pass-step-1"></div>
                          <div class="pass-step-2"></div>
                          <div class="pass-step-3"></div>
                          <div class="pass-step-4"></div>
                        </div>
                    </div>
                </div>
                
                <!-- for confirm password  -->
                <div>
                <label class="set-pass-label pb-0 mb-0" for="re-password">
                New password (confirm)</label>
                <div class="employ-login-single-box pc-set-pass-label mt-0">
                <input 
                class="border-0 w-100 pt-2 employ-login-border px-3 focus-none" 
                id="re-password" 
                name="password_confirmation"
                type="password" 
                placeholder="Please enter again to confirm" 
                onkeyup="matchPassword()" 
                required 
                />
                
                <span class="eye pb-2" onclick="showRePass()">
                <i
                class="fa-regular fa-eye"
                onclick="showRePasswordIcon()"
                id="repassword-show"
                ></i>
                <i
                class="fa-regular fa-eye-slash"
                onclick="hideRePasswordIcon()"
                id="repassword-hide"
                ></i>
                </span>
                </div>
                <p class="" id="notMatchAlert"></p>
                </div>
                
                <div class="d-flex align-content-center">
                    <input 
                    class="login-checkbox" 
                    type="checkbox" 
                    name="checkbox" 
                    id="checkbox">
                    <label class="px-2 pt-1 login-" for="checkbox login-checkbox">Remember me?.</label>
                </div>

                <div class="py-5">
                    <button 
                    class="switch-button set-pass-btn w-50 m-auto" 
                    id="set-pass-submit" type="submit">Set</button>
                </div>
            </form>
            
    </div>


</section>

@include('includes.footer')

@endsection
@push('scripts')
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/password-check.js')}}"></script>
@endpush