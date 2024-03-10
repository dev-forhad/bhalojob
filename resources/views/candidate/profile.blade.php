@extends('layouts.app')

@section('content')

<!-- Header start -->

@include('includes.header')

<!-- Header end -->

@push('styles')

<link rel="stylesheet" href="{{asset('css/style.css')}}" />
<style>
    #pass_error{
        color: red;font-weight:bold;
    }
</style>
@endpush

<div class="authpages" style="margin:20px 0">
@php
        $years = DB::table('years')->get();
        $exp_years = DB::table('years')->where('year_value','>',2023)->get();
        $months = DB::table('months')->get();
        $days = DB::table('days')->get();
        $maritalStatus = DB::table('marital_statuses')->get();
        $genders = DB::table('genders')->get();
        $currentVisas = DB::table('currentvisas')->get();
    @endphp
    
    <!--<div class="container">-->

    <!--   <div class="row justify-content-center">-->
           <!--<div class="col-md-7">-->
               <section class="v-code-main-box col-lg-8 col-12 m-auto px-lg-0  px-0">
                   <div class="profile-creation-heading">
                    <h1>Profile creation: Step <span id="counter-text">1</span> of 9</h1>
                    </div>
    
                    <div class="line-box d-none d-lg-flex">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                        <div class="line-three"></div>
                    </div>
    
                    <div class="d-lg-none d-block">
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
              

            <!--<h5 class="step-counter-h5">Profile creation: Step <span id="counter-text">1</span> of 9</h5>-->

            <!-- start form  -->
            
              <!-- step one  -->
              <div id="step-one">
                <!-- form header  -->
                
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-10 py-2 header-text">
                    Basic information
                  </DIV>
                </div>

                <!-- form body  -->
                <form id="personalInformationForm" class="mb-5">
                    @csrf
                    <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box">
                  <!-- for name -->
                  
                   <div class="d-lg-flex align-content-center ">
                      <label class=" fw-bolder col-lg-3 col-12 d-block pt-2 input-label" for="name">Your name</label>
                      <div class="col-lg-9 col-12 d-lg-flex align-content-center justify-content-end px-0    ">
                        <input class="input-box-pc mr-4 w-lg-50" id="first-name" type="text" placeholder="Last Name" name="last_name" value="{{old('last_name') ?? $user->last_name}}">
                        <input class="input-box-pc mr-3 w-lg-50 mt-lg-0 mt-2" id="last-name" name="first_name" value="{{ old('first_name') ?? $user->first_name }}" type="text" placeholder="First Name">
                      </div>
                    </div>

                  <!-- for gender -->
                  <div class="d-lg-flex align-content-center ">
                      <label class="fw-bolder d-block pt-2 col-lg-3 col-12 input-label" for="Gender">Gender</label>
                      <select class="input-box-pc col-lg-4 col-12" id="gender_id" name="gender_id">
                        <option>Select Gender</option>
                        @foreach($genders as $gender)
                            <option value="{{$gender->id}}" {{($gender->id == $user->gender_id) ? 'selected' : ''}}>{{$gender->gender}}</option>
                        @endforeach
                    </select>
                    </div>

                  <!-- for date of birth  -->
                  <div class="d-lg-flex  align-bottom ">
                      <label class="fw-bolder col-lg-3 col-12 pt-2 d-block input-label" for="date-of-birth">Date of birth</label>
                    <div class="row">
                       <div class="col-4 d-flex justify-content-between ">
                        <select class="input-box-pc" id="birth_year" name="birth_year" required>
                            <option>Year</option>
                            @foreach($years as $year)
                                <option value="{{$year->id}}" {{($year->id == $user->birth_year) ? 'selected' : ''}}>{{$year->year_value}}</option>
                            @endforeach
                        </select>
                        <p class="pt-2 ps-2 px-1 d-lg-block d-none">Year</p>
                      </div>

                       <div class="col-4 d-flex justify-content-between p-0">
                        <select class="input-box-pc"
                        name="birth_month">
                            <option>Month</option>
                            @foreach($months as $month)
                                <option value="{{$month->id}}" {{($month->id == $user->birth_month) ? 'selected' : ''}}>{{$month->eng_title}}</option>
                            @endforeach
                           
                        </select>
                         <p class="pt-2 ps-2 px-1 d-lg-block d-none">Month</p>
                      </div>

                      <div class="col-4 d-flex justify-content-between">
                        <select class="input-box-pc" name="birth_day">
                            <option>Day</option>
                            @foreach($days as $day)
                                <option value="{{$day->id}}" {{($day->id == $user->birth_day) ? 'selected' : ''}}>{{$day->id}}</option>
                            @endforeach
                        </select>
                        <p class="pt-2 ps-2 px-1 d-lg-block d-none">Day</p>
                      </div>
                    </div>
                  </div>

                  <!-- for Marital status -->
                  <div class="d-lg-flex ">
                      <label class=" fw-bolder col-lg-3 col-12 d-block input-label pr-0 d-flex align-items-center" for="marital-status">Marital status</label>
                    <select class="input-box-pc col-lg-4 col-12" id="marital_status_id" name="marital_status_id">
                        <option>Select Marital Status</option>
                        @foreach($maritalStatus as $status)
                            <option value="{{$status->id}}" {{($status->id == $user->marital_status_id) ? 'selected' : ''}}>{{$status->marital_status}}</option>
                        @endforeach
                    </select>
                  </div>

                  <!-- for children -->
                  <div class="d-lg-flex  align-content-center ">
                      <label class="fw-bolder d-block col-lg-4 col-12 input-label pt-2" for="children">Do you have children?</label>
                    <select class="input-box-pc col-lg-4 col-12" name="has_children" id="children">
                      <option value="yes" {{$user->has_children == 'yes' ? 'selected' : ''}}>Yes</option>
                      <option value="no" {{$user->has_children == 'no' ? 'selected' : ''}}>No</option>
                    </select>
                  </div>

                  <!-- for number-children -->
                  <div class="d-lg-flex  align-content-center ">
                      <label class="fw-bolder d-block col-lg-4 col-12 input-label pt-2" for="number-children">Number of children?</label>
                    <input type="text" name="bd_children" value="{{$user->bd_children}}" class="input-box-pc ms-4 col-lg-4 col-12" required>
                  </div>

                  <!-- for vuttons -->
                  <div class="d-lg-flex  mt-4 align-content-center justify-content-center  ">
                     
                      
                      <button class="switch-button" type="button" onclick="submitPersonalInformationForm()" id="step1next">Save & Next</button>
                  </div>
                </div>
                </form>
              </div>


              <!-- step two  -->
             <div id="step-two">
                <!-- form header  -->
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-10 py-2 header-text">
                    Your address
                  </DIV>
                </div>
                <form id="addressInformationForm">
                    @csrf
                <!-- form body  -->
                <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box">
                  <!-- for country -->
                  {{--<div class="flex-input-field">
                      <label class=" fw-bolder d-block input-label w-50" for="country">Where do you live?</label>
                    <select class="input-box-pc w-50 mx-0" name="country_id" id="country_id">
                        
                        <option>Select Country</option>
                         @foreach($countries as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        
                      <!--<option value="female">Female</option>-->
                    </select>
                    
                  </div>--}}
                  <div class="flex-input-field {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
                    <label class=" fw-bolder d-block input-label col-6" for="country">{{__('Where do you live?')}}</label>
                    <?php $country_id = old('country_id_bd', (isset($user) && (int)$user->country_id_bd > 0) ? $user->country_id_bd : $siteSetting->default_country_id); ?>
                   
                    {!! Form::select('country_id', [''=>__('Select Country')]+$countries, $country_id, array('class'=>'input-box-pc col-6 mx-0 required', 'id'=>'country_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} </div>

                  <!-- for Nationality -->
                  <div class="flex-input-field">
                      <label class="  fw-bolder d-block col-6 input-label" for="nationality">Nationality</label>
                     <?php $nationality_id = old('nationality_id', (isset($user) && (int)$user->nationality_id > 0) ? $user->nationality_id : ''); ?>
                    
                    {!! Form::select('nationality_id', [''=>__('Select Nationality')]+$nationalities, $nationality_id, array('class'=>'input-box-pc col-6 mx-0 required', 'id'=>'nationality_id')) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'nationality_id') !!}
                  </div>
                    <!-- for Mother Tonge -->
                  <div class="flex-input-field mobile-number">
                      <label class="    fw-bolder col-5  col-lg-6 col-lg-6 input-label d-block" for="phone">Mother tongue</label>
                    <input class="input-box-pc d-block text-left col-7 col-lg-6" id="mother_tongue" type="text" value="{{old('mother_tongue') ?? $user->mother_tongue}}" name="mother_tongue" placeholder="Your Mother Tongue">
                  </div>
                  <!-- for phone -->
                  <div class="flex-input-field mobile-number">
                      <label class="    fw-bolder col-5  col-lg-6 col-lg-6 input-label d-block" for="phone">Mobile number</label>
                    <input class="input-box-pc d-block text-left col-7 col-lg-6" id="phone" type="number" value="{{old('phone') ?? $user->phone}}" name="phone" placeholder="Your mobile number">
                  </div>

                  <!-- for present address -->
                  <div class="flex-input-field present-address">
                    <label class=" fw-bolder input-label w-50 d-block" for="present-address">Present address</label>
                    <div class="address-boxgroup">
                      <div class="d-flex align-content-center my-2">
                        <div class="mx-1 w-50">
                          <span class="mb-1">Postal code (Optional)</span>
                          <input class="input-box-pc d-block text-left mt-1" id="bd_postal_code" name="bd_postal_code" value="{{$user->bd_postal_code}}" type="text" placeholder="">
                        </div>
                        {{--<div class="mx-1 w-50">
                          <span class="small-label">State/Division/District</span>
                          
                          <select class="input-box-pc" name="state_id" id="state_id">
                          </select>
                        </div>--}}
                         <div class="mx-1 w-50 {!! APFrmErrHelp::hasError($errors, 'state_id') !!}">
                            <label for="">{{__('State/Division/District')}}</label>
                            <span id="state_bd" class="mb-1">
                                <?php $stateid = old('state_id', (isset($user) && (int)$user->state_id > 0) ? $user->state_id : ''); ?>
                                
                                {!! Form::select('state_id', [''=>__('Select State')], $stateid, array('class'=>'input-box-pc required', 'id'=>'state_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'state_id') !!}
                        </div>
                      </div>

                      <div class="d-flex align-content-center my-2 ">
                        <!--<div class="mx-1 w-50">-->
                        <!--  <span class="small-label">City/P.S./Thana</span>-->
                        <!--  <select class="input-box-pc" name="city_id" id="city_id">-->
                        <!--  </select>-->
                        <!--</div>-->
                         <div class="mx-1 w-50 {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
                            <label for="">{{__('City')}}</label>
                            <?php $city_id = old('city_id', (isset($user) && (int)$user->city_id > 0) ? $user->city_id : ''); ?>
                            <span id="city_bd"> {!! Form::select('city_id', [''=>__('Select City')], $city_id, array('class'=>'input-box-pc required', 'id'=>'city_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
                        </div>
                        <div class="mx-1 w-50">
                          <span class="">Word/Village/Road</span>
                          <input class="input-box-pc d-block text-left mt-1" id="present-address" name="bd_village" type="text" placeholder="" value="{{ $user->bd_village}}">
                        </div>
                      </div>
                      
                      <div class="d-flex align-content-center ">
                        <div class="mx-1 w-100">
                          <span class="">House no:</span>
                          <input class="input-box-pc d-block text-left mt-1" id="house-no" type="text" name="bd_address" placeholder="" value="{{ $user->bd_address}}">
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- for buttons -->
                  <div class="d-flex mt-4 align-content-center justify-content-center  ">
                      <button class="switch-button mx-4" id="step2pre" type="button">Back</button>
                      <button class="switch-button" onclick="submitAddressInformationForm()" id="step2next" type="button">Save & Next</button>
                  </div>
                </div>
                </form>
                
              </div>

              <!-- step three  -->
              <div id="step-three">
                <!-- form header  -->
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-10 py-2 header-text">
                    Upload your image
                  </DIV>
                </div>

                <!-- form body  --> 
                <form id="imageInformationForm" enctype="multipart/form-data">
                    @csrf
                <div class="p-4 py-4 col-lg-8 col-12 m-auto all-field-box">

                  <!-- for uploading photo -->
                   @if($user->image == NULL || $user->image == '')
                  
                    <div class="upload-photo p-4 text-center pt-5" onclick="uploadImage()" id="upload-box">
                      <div class="photo-icon">
                        <i class="fa-solid h3 fa-image m-0"></i>
                      </div>
                      <h5 class="mt-2">Drop your image here, or <span style="color:#d71921">browse</span></h5>
                      <h6>Supports: JPG, PNG</h6>
                      <h6>(Passport size picture dimensions 1.77x2.17 inches)</h6>
                    </div>

                    <div class="text-center">
                      <img class="col-2 m-auto d-none" id="uploadedImg" src="" alt="" />
                      <input style="display: none;" disabled onclick="uploadAgain()" type="file" id="extra-upload">
                    </div>

                    <div class="text-center ">
                      <input style="display: none;" onchange="prevwprofile()" id="filePicker" name="profile_image" type="file">
                    </div>
                 @endif
                @if($user->image != NULL)
                  <div class="d-flex justify-content-center">
                      
                      <img src="{{asset('user_images/'.$user->image)}}" width="200px" height="200px" id="output_image" />
                  </div>
                  <div class="d-flex justify-content-center">
                      <input type="file" name="profile_image" class="" onchange="preview_image(event)">
                  </div>
                @endif
                  

                  <!-- for buttons -->
                  <div class="d-flex mt-4 align-content-center justify-content-center  ">
                      <button class="switch-button mx-4" id="step3pre" type="button">Back</button>
                      <button class="switch-button" onclick="submitImageInformationForm()" id="step3next" type="button">Save & Next</button>
                  </div>
                </div>
                </form>
              </div>

              <!-- step four  -->
              <div id="step-four">
                <!-- form header  -->
                <div class="form-header-with-skip">
                  <div class=" header-dark-box"></div>
                  <DIV class="p-2 pr-0 custom-flex ">VISA Details</DIV>
                  <div class="h6 padding-top-on-header">
                    <div class="custom-flex">
                      <p class="d-block text-left pr-5" style="color: #d71921;">(if you are in Japan)</p>
                      <p class="d-block text-right">
                        <button class="d-block skip-btn-on-header" type="button" id="step4nextBySkip" style="
    color: #d71921;
    text-decoration: underline;">Skip</button>
                      </p>
                    </div>
                  </div>
                </div>
                 <form id="visaInformationForm">
                    @csrf
                <div class="p-4 py-4 col-lg-8 col-12 m-auto all-field-box">
                  <!-- for visa stutas -->
                  <div>
                    <label class=" fw-bolder d-block input-label" for="visa-status">Current VISA status</label>
                    <select class="input-box input-text-color visa_status" name="current_visa_status_id" id="visa-status">
                        <option value="" selected>Please Select</option>
                        @foreach($currentVisas as $visaStatus)
                            <option value="{{$visaStatus->id}}" {{($visaStatus->id == $user->current_visa_status_id) ? 'selected' : ''}}>{{$visaStatus->eng_title}}</option>
                        @endforeach
                    </select>
                  </div>

                  <!-- for VISA expiry -->
                  <div>
                    <label class=" fw-bolder d-block input-label" for="visa-expiry">VISA expiry</label>
                    <div>
                      <div class="d-flex align-content-center ">
                        <div class="mx-1 w-50">
                          <!--<select class="input-box input-text-color" name="visa-expiry-year" id="visa-expiry-year">-->
                          <!--  <option value="2023">2023</option>-->
                          <!--  <option value="2024">2024</option>-->
                          <!--  <option value="2025">2025</option>-->
                          <!--</select>-->
                          <select class="input-box input-text-color jp-visa-expiry-year" id="birth_year" name="jp_visa_expiry_year"
                                required>
                              <option value="" selected>Select Year</option>
                            <!--<option value="" disabled></option>-->
                            @foreach($exp_years as $year)
                                <option value="{{$year->id}}" {{($year->id == $user->jp_visa_expiry_year) ? 'selected' : ''}}>{{$year->year_value}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mx-1 w-50">
                          <select class="input-box input-text-color visa-expiry-month" name="visa-expiry-month" id="visa-expiry-month">
                              <option value="" selected>Select Month</option>
                            @foreach($months as $month)
                                <option value="{{$month->id}}" {{($month->id == $user->jp_visa_expiry_month) ? 'selected' : ''}}>{{$month->eng_title}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- for buttons -->
                  <div class="d-flex mt-4 align-content-center justify-content-center">
                      <button class="switch-button mx-4"  id="step4pre" type="button">Back</button>
                      <button class="switch-button" onclick="submitVisaInformationForm()" id="step4next" type="button">Save & Next</button>
                  </div>
                </div>
                </form>
              </div>

              <!-- step five  -->
              <div id="step-five">
                <!-- form header  -->
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-10 py-2 header-text">
                    Language skill
                  </DIV>
                </div>

                <!-- form body  -->
                <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box">
                  <!-- for Japanese language skill -->
                  <!--<div>-->
                  <!--  <label class=" fw-bolder d-block input-label" for="japan-lan">Japanese language skill</label>-->
                  <!--  <select class="input-box input-text-color" name="japan-lan" id="japan-lan">-->
                  <!--    <option value="student">JLPT N1</option>-->
                  <!--    <option value="something">Something</option>-->
                  <!--  </select>-->
                  <!--</div>-->

                  <!-- for Japanese language skill -->
                  <!--<div>-->
                  <!--  <label class=" fw-bolder d-block input-label" for="english-lan">English language skill</label>-->
                  <!--  <select class="input-box input-text-color" name="english-lan" id="english-lan">-->
                  <!--    <option value="student">JBusiness level</option>-->
                  <!--    <option value="something">Something</option>-->
                  <!--  </select>-->
                  <!--</div>-->

                  <!-- for adding new lan  -->
                  <!--<div class="pt-4">-->
                  <!--  <button class="skip-btn" type="button">+ Add language</button>-->
                  <!--</div>-->
                  
                    @include('candidate.language.languages')
                  <!-- for buttons -->
                  <div class="d-flex mt-2 align-content-center justify-content-center  ">
                      <button class="switch-button mx-4" id="step5pre" type="button">Back</button>
                      <button class="switch-button" id="step5next" type="button">Save & Next</button>
                  </div>
                </div>
              </div>

              <!-- step six  -->
              <div id="step-six">
                <!-- form header  -->
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-11 py-2 px-4 header-text">
                    Educational background
                  </DIV>
                </div>

                <!-- form body  -->
                <!-- form body  -->
                <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box">

                  <!-- for Japanese language skill -->
                  

                  <!-- for Japanese language skill -->
                 {{-- <form class=" add_edit_profile_education_default_2" method="POST"    action="{{ route('store.front.profile.education.default', [$user->id]) }}">
                      @csrf
                      <input type="hidden" name="education_type" value="2">
                    <input type="hidden" name="id" value="{{isset($hscInformation->id)? $hscInformation->id :''}}">
                  <div>
                    <label class=" fw-bolder d-block input-label" for="secondary">High School/College/Diploma</label>
                    <div>
                        
                      <div class="custom-flex py-2">
                        <select class="input-box deep-placeholder mr-4" name="entrance_year" id="secondary">
                          <option > Select Year</option>
                            @foreach($years as $year)
                                <option value="{{$year->id}}" {{isset($hscInformation->entrance_year) && $year->id == $hscInformation->entrance_year ? "selected" :''}}>{{$year->year_value}}</option>
                            @endforeach
                        </select>

                        <select class="input-box deep-placeholder ms-4" name="entrance_month" id="entrance_month">
                          @foreach($months as $month)
                            <option value="{{$month->id}}" {{isset($hscInformation->entrance_month) && $month->id == $hscInformation->entrance_month ? "selected" :''}}>{{$month->eng_title}}</option>
                        @endforeach
                        </select>
                      </div>

                      <div class="custom-flex py-2">
                        <select class="input-box deep-placeholder mr-4" name="pass_year" id="pass_year">
                          <option  >Select Year</option>
                            @foreach($years as $year)
                                <option value="{{$year->id}}" {{isset($hscInformation->pass_year) && $year->id == $hscInformation->pass_year ? "selected" :''}} >{{$year->year_value}}</option>
                            @endforeach
                        </select>

                        <select class="input-box deep-placeholder ms-4" name="pass_month" id="pass_month">
                          @foreach($months as $month)
                                <option value="{{$month->id}}" {{isset($hscInformation->pass_month) && $month->id == $hscInformation->pass_month ? "selected" :''}} >{{$month->eng_title}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div id="pass_error"></div>

                      <div class="custom-flex py-2">
                        <input class="input-box deep-placeholder" type="text" name="institution_name" value="{{isset($hscInformation->institution_name) ? $hscInformation->institution_name :''}}">
                      </div>
                      <!--<div class="custom-flex py-2">-->
                      <!--  <input class="input-box deep-placeholder" id="major" name="major" type="text" placeholder="Major (If Diploma)">-->
                      <!--</div>-->
                      <div class="col-md-12 form-group mt-4">
                        <button type="button" class="btn btn-large btn-primary" onClick="submitDefaultProfileEducationForm(2);">{{__('Update High School Info')}} <i   class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                    </div>

                    </div>
                  </div>
                  </form>--}}


                  <!-- for adding new lan  -->
                  <!--<div>-->
                  <!--  <button class="skip-btn" type="button">+ Add education</button>-->
                  <!--</div>-->
                  @include('user.forms.education.educationfront')

                  <!-- for buttons -->
                  <div class="d-flex mt-3 align-content-center justify-content-center  ">
                      <button class="switch-button mx-4" id="step6pre" type="button">Back</button>
                      <button class="switch-button" id="step6next" type="button">Save & Next</button>
                  </div>
                </div>
              </div>

              <!-- step seven  -->
              <div id="step-seven" class="page">
                <!-- form header  -->
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-11 py-2 px-4 header-text">
                    Work experience
                  </DIV>
                </div>

                <!-- form body  -->
                <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box form-outer">
                    @include('user.forms.experience.experience')
                  <!-- for Japanese language skill -->
                  <!--<div>-->

                  <!--  <div class="custom-flex py-2">-->
                  <!--    <input class="input-box deep-placeholder" id="company-name" name="company-name" type="text" placeholder="Company name">-->
                  <!--  </div>-->
                  <!--  <div class="custom-flex py-2">-->
                  <!--    <input class="input-box deep-placeholder" id="designation" name="designation" type="text" placeholder="Designation">-->
                  <!--  </div>-->

                  <!--  <div>-->
                  <!--    <div class="custom-flex py-2">-->
                  <!--      <select class="input-box deep-placeholder mr-4" name="entry-year" id="entry-year">-->
                  <!--        <option value="entry-year">Entry year</option>-->
                  <!--        <option value="something">Something</option>-->
                  <!--      </select>-->

                  <!--      <select class="input-box deep-placeholder ms-4" name="entry-month" id="entry-month">-->
                  <!--        <option value="entry-month">Entry month</option>-->
                  <!--        <option value="something">Something</option>-->
                  <!--      </select>-->
                  <!--    </div>-->

                  <!--    <div class="custom-flex py-2">-->
                  <!--      <select class="input-box deep-placeholder mr-4" name="resigned-year"  id="resigned-year">-->
                  <!--        <option value="resigned-year">Resigned year</option>-->
                  <!--        <option value="something">Something</option>-->
                  <!--      </select>-->

                  <!--      <select class="input-box deep-placeholder ms-4" name="resigned-month" id="resigned-month">-->
                  <!--        <option value="resigned-month">Resigned month</option>-->
                  <!--        <option value="something">Something</option>-->
                  <!--      </select>-->
                  <!--    </div>-->

                  <!--  </div>-->
                  <!--</div>-->

                  <!-- for adding new lan  -->
                  <!--<div class=" d-flex ">-->
                  <!--  <input type="checkbox" name="checkbox" id="checkbox">-->
                  <!--  <label class="px-2" for="checkbox">currently working here.</label>-->
                  <!--</div>-->

                  <!-- for adding new lan  -->
                  <!--<div>-->
                  <!--  <button class="skip-btn " type="button">+ Add work experience</button>-->
                  <!--</div>-->

                  <!-- for buttons -->
                  <div class="d-flex align-content-center justify-content-center  ">
                      <button class="switch-button mx-4" id="step7pre" type="button">Back</button>
                      <button class="switch-button" id="step7next" type="button">Save & Next</button>
                  </div>
                </div>
              </div>

              <!-- step eight  -->
              <div id="step-eight">
                <!-- form header  -->
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-11 py-2 px-4 header-text">
                    Certifications
                  </DIV>
                </div>

                <!-- form body  -->
                <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box">

                  <!-- for Japanese language skill -->
                  {{--<div>
                    <label class="fw-bolder d-block w-50 input-label" id="certifications-box-toggler" for="country">Japanese Language</label>

                    <div id="certifications-box">
                      <div class="custom-flex py-2">
                        <input class="input-box" id="JLPT-N1" name="JLPT-N1" type="text" placeholder="" value="JLPT N1">
                      </div>

                      <div>
                        <div class="custom-flex py-2">
                          <select class="input-box mr-4" name="year" id="year">
                            <option value="2004">2004</option>
                            <option value="something">Something</option>
                          </select>

                          <select class="input-box ms-4" name="month" id="month">
                            <option value="06">06</option>
                            <option value="something">Something</option>
                          </select>
                        </div>

                      </div>
                    </div>

                  </div>


                  <!-- for adding new lan  -->
                  <div>
                    <button class="skip-btn" type="button">+ Add certification</button>
                  </div>--}}
                   @include('user.forms.skill.skills')

                  <!-- for buttons -->
                  <div class="d-flex mt-4 align-content-center justify-content-center  ">
                      <button class="switch-button mx-4" id="step8pre" type="button">Back</button>
                      <button class="switch-button" id="step8next" type="button">Save & Next</button>
                  </div>
                </div>
              </div>

              <!-- step nine  -->
              <div id="step-nine">
                <!-- form header  -->
                <div class="form-header">
                  <div class=" header-dark-box"></div>
                  <DIV class="col-11 py-2 px-4 header-text">
                    Self introduction
                  </DIV>
                </div>

                <!-- form body  -->
                <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box">
                    <div id="success_msg"></div>
                    <form class="form" id="add_edit_profile_summary" method="POST" action="{{ route('store.profile.summary', [$user->id]) }}">
                        @csrf
                  <!-- for text area  -->
                  <div class="pb-5">
                    <textarea class="d-block w-100 p-3 py-1" placeholder="Write down about yourself. Example: hobbies, strength, good at , motivation etc" name="summary" id="message" cols="30" rows="10">{{ old('summary', (isset($user))? $user->getProfileSummary('summary'):'') }}</textarea>
                    <span class="help-block summary-error"></span>
                  </div>

                  <!-- for buttons -->
                  <div class="d-flex mt-4 align-content-center justify-content-center  ">
                      <button class="switch-button mx-4" id="step9pre" type="button">Back</button>
                      <button class="switch-button" onClick="submitProfileSummaryForm();" id="step9next" type="button">Save</button>
                  </div>
                  </form>
                  
                </div>
              </div>
              


            <!--</form>-->
            <!-- end form  -->
            </section>
    <!--       </div>-->
    <!--   </div>-->

    <!--</div>-->

</div>

@include('includes.footer')

@endsection
@push('scripts')
<script>
$(document).ready(function(){
     $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterStates(0);
        });
        
        

        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterCities(0);
        });
         filterStates(<?php echo old('state_id', $user->state_id); ?>);
});
        function showPageOthers(showdiv) {
            $(showdiv).show();
        }

        function showPageVisaExpire(showdiv) {
            $(showdiv).show();
        }

        function showPageEducation(showdiv) {
            $(showdiv).show();
        }

        function showPageLanguage(showdiv) {
            $(showdiv).show();
        }
         function showProfileLanguageModal() {

            $("#add_language_modal").modal();

            loadProfileLanguageForm();

        }
        function preview_image(event) 
        {
         var reader = new FileReader();
         reader.onload = function()
         {
          var output = document.getElementById('output_image');
          output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
        }
        function loadProfileLanguageForm() {

            $.ajax({

                type: "POST",

                url: "{{ route('language.form', $user->id) }}",

                data: {"_token": "{{ csrf_token() }}"},

                datatype: 'json',

                success: function (json) {

                    $("#add_language_modal").html(json.html);

                }

            });

        }
           
           

            /*******************************/
            

        function filterStates(state_id) {
            var country_id = $('#country_id').val();
            if (country_id != '') {
                $.post("{{ route('filter.lang.states.dropdown') }}", {
                    country_id: country_id,
                    state_id: state_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {
                        $('#state_id').html(response);
                        
                         filterCities(<?php echo old('city_id', $user->city_id); ?>);
                    });
            }
        }

        function filterCities(city_id) {
            var state_id = $('#state_id').val();
            if (state_id != '') {
                $.post("{{ route('filter.lang.cities.dropdown') }}", {
                    state_id: state_id,
                    city_id: city_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {
                        $('#city_id').html(response);
                    });
            }
        }
        function submitPersonalInformationForm() {
            // alert('Submit');
            var form = $('#personalInformationForm');
            $.ajax({
                url: "{{ route('store.personalinfo') }}",
                type: "POST",
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);
                    // You can navigate to the next step here
                    
                    showStep2();
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                     showStep2();
                    console.log(xhr.responseText);
                }
            });
        }
            function submitDefaultProfileEducationForm(education_type){

        
            if (education_type == 1) {
                var form = $('.add_edit_profile_education_default_1');
            } else if (education_type == 2) {
                var form = $('.add_edit_profile_education_default_2');
            } else {
                var form = $('.add_edit_profile_education_default_3');
            }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#print_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
      

        // Submit form via AJAX
        $.ajax({
            url: form.attr('action'),

            type: form.attr('method'),

            data: form.serialize(),

            dataType: 'json',


            success: function(response) {
             
                console.log(response);

                if (education_type == 1) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Secondary education info successfully updated!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                   
                } else if (education_type == 2) {
                 
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Higher secondary info successfully updated!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                   
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'University info successfully update',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }


                
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.log(xhr.responseText);
            } 
        });

    }

        
        function submitAddressInformationForm(){
            var form = $('#addressInformationForm');
            $.ajax({
                url: "{{ route('store.addressinfo') }}",
                type: "POST",
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);
                    // You can navigate to the next step here
                    showStep3();
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.log(xhr.responseText);
                }
            });
        }
        function submitImageInformationForm(){
            // var form = $('#imageInformationForm');
            var form = $('#imageInformationForm')[0];
            var formData = new FormData(form);
            $.ajax({
                url: "{{ route('store.profilepic') }}",
                type: "POST",
                data: formData,
                dataType: 'json',
                contentType: false, // Set to false to let jQuery handle it automatically
                processData: false,
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);
                    // You can navigate to the next step here
                      
                    showStep4();
                    
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.log(xhr.responseText);
                }
            });
        }
        function submitVisaInformationForm(){
            var form = $('#visaInformationForm');
            if($('.visa_status').val() == ''){
                alert('Please Select Visa Status first');
                return false;
                
                
            }
            if($('.jp-visa-expiry-year').val() == ''){
                alert('Please Select Visa expiry Year');
                return false;
            }
            if($('.visa-expiry-month').val() == ''){
                    alert('Please Select Visa expiry Month');
                    return false;
                }
            $.ajax({
                url: "{{ route('store.uservisa') }}",
                type: "POST",
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);
                    // You can navigate to the next step here
                    showStep5();
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.log(xhr.responseText);
                }
            });
        }
        function submitProfileSummaryForm() {
            var form = $('#add_edit_profile_summary');
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function (json) {
                    $("#success_msg").html('<span class="text text-success">Summary updated successfully</span>');
                    window.location.href="{{route('thanku')}}";
                },
                error: function (json) {
                    if (json.status === 422) {
                        var resJSON = json.responseJSON;
                        $('.help-block').html('');
                        $.each(resJSON.errors, function (key, value) {
                            $('.' + key + '-error').html('<strong>' + value + '</strong>');
                            $('#div_' + key).addClass('has-error');
                        });
                    } else {
                        // Error
                        // Incorrect credentials
                        // alert('Incorrect credentials. Please try again.')
                    }
                }
            });
    }
    function prevwprofile() {
      const uploadedImg = document.getElementById("uploadedImg");
      const file = document.getElementById("filePicker").files[0];
      if (file) {
        document.getElementById("upload-box").style.display = "none";
        document.getElementById("filePicker").style.display = "inline-block";
        uploadedImg.classList.add("d-block");
        const reader = new FileReader();
        reader.addEventListener("load", () => {
          uploadedImg.src = reader.result;
        });
        reader.readAsDataURL(file);
      } else {
          uploadedImg.classList.add("d-none");
        uploadedImg.src = "";
      }
    }

    // get step box and buttons


// certification label hundler
// const certificationsBoxToggler = () => {
//   const certificationsbox = document.getElementById("certifications-box");
//   if (certificationsbox.style.display === "block") {
//     certificationsbox.style.display = "none";
//   } else {
//     certificationsbox.style.display = "block";
//   }
// };
// document
//   .getElementById("certifications-box-toggler")
//   .addEventListener("click", certificationsBoxToggler);

// ############################## wmployee registation page ###########################




</script>
@endpush

@section('js')

<script>
$(document).ready(function() {
    
let step1 = document.getElementById("step-one");
let step2 = document.getElementById("step-two");
let step3 = document.getElementById("step-three");
let step4 = document.getElementById("step-four");
let step5 = document.getElementById("step-five");
let step6 = document.getElementById("step-six");
let step7 = document.getElementById("step-seven");
let step8 = document.getElementById("step-eight");
let step9 = document.getElementById("step-nine");



const showstep1 = () => {
  document.getElementById("pointer-1").style.backgroundColor = "#d71921";
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 1;
  step1.style.display = "block";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep2 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#d71921";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 2;
  step1.style.display = "none";
  step2.style.display = "block";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep3 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#d71921";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 3;
  step3.style.display = "block";
  step2.style.display = "none";
  step1.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep4 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#d71921";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 4;
  step1.style.display = "none";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "block";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep5 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#d71921";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 5;
  step1.style.display = "none";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "block";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep6 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#d71921";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 6;
  step1.style.display = "none";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "block";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep7 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#d71921";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 7;
  step1.style.display = "none";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "block";
  step8.style.display = "none";
  step9.style.display = "none";
};

const showStep8 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#d71921";
  document.getElementById("pointer-9").style.backgroundColor = "#aeaeae";
  document.getElementById("counter-text").innerHTML = 8;
  step1.style.display = "none";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "block";
  step9.style.display = "none";
};

const showStep9 = () => {
  document.getElementById("pointer-2").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-1").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-3").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-4").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-5").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-6").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-7").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-8").style.backgroundColor = "#aeaeae";
  document.getElementById("pointer-9").style.backgroundColor = "#d71921";
  document.getElementById("counter-text").innerHTML = 9;
  step1.style.display = "none";
  step2.style.display = "none";
  step3.style.display = "none";
  step4.style.display = "none";
  step5.style.display = "none";
  step6.style.display = "none";
  step7.style.display = "none";
  step8.style.display = "none";
  step9.style.display = "block";
};
const uploadImage = () => {
  document.getElementById("filePicker").click();
};



// step 1
document.getElementById("step1next").addEventListener("click", showStep2);


// step 2
document.getElementById("step2pre").addEventListener("click", showstep1);
document.getElementById("step2next").addEventListener("click", showStep3);

// step 3
document.getElementById("step3pre").addEventListener("click", showStep2);
document.getElementById("step3next").addEventListener("click", showStep4);

// step 4
document.getElementById("step4pre").addEventListener("click", showStep3);
document.getElementById("step4next").addEventListener("click", showStep5);
document.getElementById("step4nextBySkip").addEventListener("click", showStep5);

// step 5
document.getElementById("step5pre").addEventListener("click", showStep4);
document.getElementById("step5next").addEventListener("click", showStep6);

// step 6
document.getElementById("step6pre").addEventListener("click", showStep5);
document.getElementById("step6next").addEventListener("click", showStep7);

// step 7
document.getElementById("step7pre").addEventListener("click", showStep6);
document.getElementById("step7next").addEventListener("click", showStep8);

// step 8
document.getElementById("step8pre").addEventListener("click", showStep7);
document.getElementById("step8next").addEventListener("click", showStep9);

// step 8
document.getElementById("step9pre").addEventListener("click", showStep8);

});

</script>
<script>
$(document).ready(function() {
    $('.jp-visa-expiry-year').change(function(){
        $('#visa-expiry-month').val('').change();
        var selectedYear = parseInt($(this).find('option:selected').html()); 
        var currentYear = new Date().getFullYear();
        
        var currentMonth = new Date().getMonth() + 1;
        var selectElement = document.getElementById('visa-expiry-month');
        
        if (selectedYear == currentYear) {
            for (var i = 0; i < selectElement.options.length; i++) {
                var option = selectElement.options[i];
                var optionValue = parseInt(option.value, 10);
        
                if (optionValue < currentMonth) {
                    option.disabled = true;
                }
            }
        } else {
            for (var i = 0; i < selectElement.options.length; i++) {
                var option = selectElement.options[i];
                var optionValue = parseInt(option.value, 10);
        
                if (optionValue < currentMonth) {
                    option.disabled = false;
                }
            }
        }
    });
});
</script>
@endsection