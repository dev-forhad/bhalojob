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
        height: 100vh;
        position:relative;
    }
    .copyright{
        position: absolute;
        bottom: 0;
            background: transparent;
    }
    .copyright p{
        font-size:12px;margin-bottom: 0;color: #000;line-height: 16px;
    }
    .text-red{
        color: #DB3036;
    }
      .language-toggle label {
      margin-bottom: 0;
    }

    .language-toggle input {
      position: absolute;
      clip: rect(0, 0, 0, 0);
    }

    .language-toggle label {
         display: inline-block;
        /* background-color: #e9ecef; */
        padding: 5px 14px;
        cursor: pointer;
        user-select: none;
        border: 1px solid #C08389;
        margin-right: -5px;  
    }

    .language-toggle input:checked + label {
      background-color: #E4293B;
      color: #fff;
    }
    .language-toggle input:first-child + label {
      border-top-left-radius: 5px; /* Set border-radius for the first button */
      border-bottom-left-radius: 5px;
    }

   .language-toggle input:last-of-type + label {
      border-top-right-radius: 5px; /* Set border-radius for the last button */
      border-bottom-right-radius: 5px;
    }
</style>
@endpush
@section('content')

<!-- Header start -->

<!-- Header end -->



<div class="authpages">

    <div class="container">
       <div class="row ">
           <div class="col-md-12 text-center mt-3">
               <div class="language-toggle" role="group" aria-label="Language Selector">
                    <input type="radio" id="jpRadio" name="language" value="jp">
                    <label for="jpRadio">JP</label>
                
                    <input type="radio" id="enRadio" name="language" value="en" checked>
                    <label for="enRadio">EN</label>
                
                    <input type="radio" id="bnRadio" name="language" value="bn">
                    <label for="bnRadio">BN</label>
                  </div>
           </div>
       </div>
       <div class="row justify-content-center">
        <div class="col-lg-6">
        @include('flash::message')



<div class="useraccountwrap bg-transparent">
<div class="userbtns">
    <div class="logo">
        <a href="{{url('/')}}"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ @$siteSetting->site_logo }}" alt="{{ @$siteSetting->site_name }}" /></a>
    </div>
    <p class="cat">Choose Your Category</p>
         <ul class="nav nav-tabs">

             <?php

             $c_or_e = old('candidate_or_employer', 'candidate');

             ?>

             <li class="nav-item"><a class="nav-link {{($c_or_e == 'candidate')? 'active':''}}" data-toggle="tab" href="#candidate" aria-expanded="true">Candidate</a></li>
              {{-- {{__('求職者')}} --}}
             <li class="nav-item"><a class="nav-link {{($c_or_e == 'employer')? 'active':''}}" data-toggle="tab" href="#employer" aria-expanded="false">Employer</a></li>
             {{-- {{__('企業向け')}} --}}

         </ul>
         <div class="terms">
             <p>I hereby confirmed that i read, understand and agreed to bhalojob <a class="red-text" href="{{url('terms-&-condition')}}">Terms & Conditions</a> and <a class="red-text">Privacy Policy.</a></p>
         </div>

         </div>
         <div class="copyright">
                <p>Copyright {{date('Y')}} @<span class="text-red">bhalojob.com</span></p>
                <p>All rights Reserve</p>
            </div>
            </div>
            
            </div>
        </div>

        <!-- <div class="col-lg-7">
        <div class="loginpageimg"><img src="{{asset('/')}}images/login-page-banner.png" alt=""></div>
        </div> -->

       </div>



    </div>

</div>
<div class="modal" id="exampleModalLong" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection