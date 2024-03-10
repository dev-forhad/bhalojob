@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Company Profile')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper employ-profile-edit">
    <div class="container">
         <div class="row">
                  <div class="col-lg-9 col-12 px-lg-2 px-0"> 
                  <div class="userccount">
                   <div class="formpanel mt0 p-0 px-lg-4 px-0 col-12 "> @include('flash::message') 
                     @include('company.inc.profile-demo')
                  </div>
                  </div>
                  </div>

                  <div class="col-md-3"> 
                 @include('includes.company_dashboard_menu')
                  </div>

         </div>    
    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
    /* @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ employee profile creation page @@@@@@@@@@@@@@@@@@ */
    .form{
        background: #f8e3df;
        padding: 20px;
    }
    .label-design {
        font-size: 15px !important;
        color: #4c4b4b !important;
        font-weight: 600 !important;
    }
    select{
        background: #fff !important;
    }
.employee-profile-creation-box {
    background-color: #f8e3df;
  }
  
  .profile-creation-heading-com h1 {
    font-size: 30px;
    font-weight: 600;
    text-align: center;
    padding: 5px;
  }
  /* for pc version ----------------------------- */
  .line-box {
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .line-one{
    width: 47%;
    height: 2px;
    background-color: #d71921;
  }
  .line-two {
    width: 6%;
    height: 10px;
    background-color: #d71921;
    border-radius: 20px;
  }
.line-three {
    width: 47%;
    height: 2px;
    background-color: #d71921;
  }
/* body start */
select {
color: #c7c7c7;
}

select option {
color: black;
}
.input-box {
    font-size: 17px;
    border: 2px solid #e15258;
    padding: 8px 15px;
    display: block;
    width: 100%;
}
.input-label {
    font-size: 18px;
    color: #4c4b4b;
    font-weight: 500;
}
.text-area-com {
    min-height: 200px;
}
.continue-com-btn {
    padding: 10px;
    display: inline-block;
    border-radius: 10px;
}
.switch-button {
    font-size: 16px;
    font-weight: bolder;
    color: white;
    padding: 8px;
    background-color: #d71921;
    display: block;
    width: 50%;
    border: none;
}
</style>
@endpush