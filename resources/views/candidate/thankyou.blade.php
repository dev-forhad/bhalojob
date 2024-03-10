@extends('layouts.app')

@section('content')

<!-- Header start -->

@include('includes.header')

<!-- Header end -->

@push('styles')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endpush
<section class="v-code-main-box col-lg-7 m-auto px-0 my-lg-5 col-md-10 col-12 ">


    <div class="d-lg-block d-none profile-creation-heading px-4">
        <h1>Profile created:</h1>
    </div>

    <div class="d-lg-flex d-none line-box">
        <div class="line-one"></div>
        <div class="line-two"></div>
        <div class="line-three"></div>
    </div>

    <div class="d-none">
        <div class="d-flex py-4 justify-content-center align-content-center col-10 m-auto">
            <div class="process-point black" id="pointer-1"></div>
            <div class="process-point" id="pointer-2"></div>
            <div class="process-point" id="pointer-3"></div>
            <div class="process-point" id="pointer-4"></div>
            <div class="process-point" id="pointer-5"></div>
            <div class="process-point" id="pointer-6"></div>
            <div class="process-point" id="pointer-7"></div>
            <div class="process-point" id="pointer-8"></div>
            <div class="process-point" id="pointer-9"></div>
        </div>
    </div>
    
    <div class="d-lg-flex d-none form-header">
        <div class="col-1 header-dark-box"></div>
        <DIV class="col-10 py-2 px-4 header-text">
          Welcome Onboard
        </DIV>
      </div>
      
    <section>

        <section class="tankyou-bg my-5 p-4">
            <h2 class="h1">Your registration is complete</h2>
            <h1>Thank you</h1>
            <a href="{{route('home')}}" class="switch-button m-auto">Go To Profile</a>
        </section>
        
        
        
    </section>



</section>
@include('includes.footer')

@endsection
@push('scripts')
<script src="{{asset('js/main.js')}}"></script>
@endpush