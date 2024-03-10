@extends('layouts.app')

@section('content')

<!-- Header start -->

@include('includes.header')

<!-- Header end -->

@push('styles')

<link rel="stylesheet" href="{{asset('css/style.css')}}" />

@endpush

<div class="authpages">
@php
        $years = DB::table('years')->get();
        $months = DB::table('months')->get();
        $days = DB::table('days')->get();
        $maritalStatus = DB::table('marital_statuses')->get();
        $genders = DB::table('genders')->get();
        $currentVisas = DB::table('currentvisas')->get();
    @endphp
    
    <!--<div class="container">-->

    <!--   <div class="row justify-content-center">-->
    <!--       <div class="col-md-7">-->
               <section class="v-code-main-box col-8 m-auto px-0 profile-edite user-profile-edit">
                   <div class="profile-creation-heading">
                    <h1>Profile creation: Step <span id="counter-text">1</span> of 9</h1>
                    </div>
    
                    <div class="line-box">
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
              

            <!--<h5 class="step-counter-h5">Profile creation: Step <span id="counter-text">1</span> of 9</h5>-->

            <!-- start form  -->
             

              <!-- step three  -->
             <div id="step-three3">
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
                <div class="p-4 py-4 col-lg-10 col-12 m-auto all-field-box">

                  <!-- for uploading photo -->
                   @if($user->image === NULL)
                  <div class="upload-photo p-4 text-center pt-5" onclick="uploadImage()">
                    <div class="photo-icon">
                      <i class="fa-solid h3 fa-image m-0"></i>
                    </div>
                    <h5 class="mt-2">Drop your image here, or <span style="color:#d71921">browse</span></h5>
                    <h6>Supports: JPG, PNG</h6>
                  </div>

                  <div>
                    <input style="display: none;" onchange="prevwprofile()" id="filePicker" name="profile_image" type="file">
                  </div>
                 @endif
                @if($user->image != NULL)
                  <div class="d-flex justify-content-center">
                      
                      {{ ImgUploader::print_image("user_images/$user->image", 200, 200) }}
                      
                  </div>
                  <div class="d-flex justify-content-center">
                      <input type="file" name="profile_image" class="">
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
              {{--<div id="step-four">
                <!-- form header  -->
                <div class="form-header-with-skip">
                  <div class="col-1 header-dark-box"></div>
                  <DIV class="p-2 pr-0 custom-flex ">VISA Details</DIV>
                  <div class="h6 padding-top-on-header">
                    <div class="custom-flex">
                      <p class="d-block text-left pr-5">if you are in Japan</p>
                      <p class="d-block text-right">
                        <button class="d-block skip-btn-on-header" type="button">Skip</button>
                      </p>
                    </div>
                  </div>
                </div>

                <!-- form body  -->
                <form id="visaInformationForm">
                    @csrf
                <div class="p-4 py-4 all-field-box">
                  <!-- for visa stutas -->
                  <div>
                    <label class=" fw-bolder d-block input-label" for="visa-status">Current VISA status</label>
                    <select class="input-box input-text-color" name="current_visa_status_id" id="visa-status">
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
                          <select class="input-box input-text-color" id="birth_year" name="jp_visa_expiry_year"
                                required>
                            <option value="" disabled>Year</option>
                            @foreach($years as $year)
                                <option value="{{$year->id}}" {{($year->id == $user->jp_visa_expiry_year) ? 'selected' : ''}}>{{$year->year_value}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mx-1 w-50">
                          <select class="input-box input-text-color" name="visa-expiry-month" id="visa-expiry-month">
                            @foreach($months as $month)
                                <option value="{{$month->id}}" {{($month->id == $user->jp_visa_expiry_month) ? 'selected' : ''}}>{{$month->eng_title}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- for buttons -->
                  <div class="d-flex mt-4 align-content-center justify-content-between  ">
                      <button class="switch-button" id="step4pre" type="button">Back</button>
                      <button class="switch-button" onclick="submitVisaInformationForm()" id="step4next" type="button">Save & Next</button>
                  </div>
                </div>
                </form>
              </div>--}}

              <!-- step five  -->
              {{--<div id="step-fivee">
                <!-- form header  -->
                <div class="form-header">
                  <div class="col-1 header-dark-box"></div>
                  <DIV class="col-10 py-2 px-4 header-text">
                    Language skill
                  </DIV>
                </div>

                <!-- form body  -->
                <div class="p-4 py-4 all-field-box">
                  

                  <!-- for adding new lan  -->
                  <!--<div class="pt-4">-->
                    
                  <!--  <a href="javascript:;" class="prolinkadd" onclick="showProfileLanguageModal();"><i class="fas fa-plus" aria-hidden="true"></i> {{__('Add Language')}} </a>-->
                  <!--</div>-->
                  <!--<div class="modal" id="add_language_modal" role="dialog">-->
                  <!--  <div class="modal-dialog" role="document">-->
                  <!--      <div class="modal-content">-->
                  <!--      </div>-->
                  <!--  </div>-->
                  <!--</div>-->
                 @include('candidate.language.languages')

                  <!-- for buttons -->
                  <div class="d-flex mt-2 align-content-center justify-content-between  ">
                      <button class="switch-button" id="step5pre" type="button">Back</button>
                      <button class="switch-button" id="step5next" type="button">Save & Next</button>
                  </div>
                </div>
              </div>--}}

             
              

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
                <div class="p-4 py-4 col-10 m-auto all-field-box">

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

              <!-- step nine  -->
             {{-- <div id="step-nine">
                <!-- form header  -->
                <div class="form-header">
                  <div class="col-1 header-dark-box"></div>
                  <DIV class="col-11 py-2 px-4 h3">
                    Self introduction
                  </DIV>
                </div>

                <!-- form body  -->
                <div class="p-4 py-4 all-field-box">
                    <div id="success_msg"></div>
                    <form class="form" id="add_edit_profile_summary" method="POST" action="{{ route('store.profile.summary', [$user->id]) }}">
                        @csrf
                  <!-- for text area  -->
                  <div class="pb-5">
                    <textarea class="d-block w-100 p-3 py-1" placeholder="Write down about yourself. Example: hobbies, strength, good at , motivation etc" name="summary" id="message" cols="30" rows="10">
                        {{ old('summary', (isset($user))? $user->getProfileSummary('summary'):'') }}
                    </textarea>
                    <span class="help-block summary-error"></span>
                  </div>

                  <!-- for buttons -->
                  <div class="d-flex mt-4 align-content-center justify-content-between  ">
                      <button class="switch-button" id="step9pre" type="button">Back</button>
                      <button class="switch-button" onClick="submitProfileSummaryForm();" id="step9next" type="button">Save</button>
                  </div>
                  </form>
                  
                </div>
              </div>--}}
              


            <!--</form>-->
            <!-- end form  -->
            </section>
    <!--       </div>-->
    <!--   </div>-->

    <!--</div>-->
    <!-- Button trigger modal -->



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
         filterStates(<?php echo old('state_id'); ?>); 
         
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
                        filterCities(<?php echo old('city_id'); ?>);
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
                    // showStep4();
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.log(xhr.responseText);
                }
            });
        }
        function submitVisaInformationForm(){
            var form = $('#visaInformationForm');
            $.ajax({
                url: "{{ route('store.uservisa') }}",
                type: "POST",
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    // Handle the response from the server
                    console.log(response);
                    // You can navigate to the next step here
                    // showStep3();
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
        function submitDefaultProfileEducationForm(education_type){

        
        if (education_type == 1) {
            var form = $('.add_edit_profile_education_default_1');
        } else if (education_type == 2) {
            var form = $('.add_edit_profile_education_default_2');
        } else {
            var form = $('.add_edit_profile_education_default_3');
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


 
// certification label hundler
const certificationsBoxToggler = () => {
  const certificationsbox = document.getElementById("certifications-box");
  if (certificationsbox.style.display === "block") {
    certificationsbox.style.display = "none";
  } else {
    certificationsbox.style.display = "block";
  }
};
document
  .getElementById("certifications-box-toggler")
  .addEventListener("click", certificationsBoxToggler);

// ############################## wmployee registation page ###########################




</script>
@endpush