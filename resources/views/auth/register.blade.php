@extends('layouts.app')

@section('content')

<!-- Header start -->

@include('includes.header')

<!-- Header end -->

<style>
    .profile-edite.user-profile-edit .progress-bar .step .bullet.active span {
        display: block;
        background: #D71921;
        color: #fff;
        border-color: #D71921;
    }
    .profile-edite.user-profile-edit .progress-bar .step .bullet:before, .profile-edite.user-profile-edit .progress-bar .step .bullet:after{
        display:none;
    }
    .nav-tabs>li a {
        border: 1px solid #d71921 !important;
        color: #d71921 !important;
        background: #fff !important;
    }
    .nav-tabs .active {
        color: #fff !important; 
        background: #d71921 !important;
    }
</style>

<div class="authpages">

    <div class="container">

       <div class="row">
        <div class="col-lg-12">
        @include('flash::message')



<div class="useraccountwrap">
<div class="userbtns">

             <ul class="nav nav-tabs">

                 <?php

                 $c_or_e = old('candidate_or_employer', 'candidate');
                
                 ?>
                 <li class="nav-item"><a class="nav-link {{($c_or_e == 'candidate')? 'active':''}}" data-toggle="tab" href="#candidate" aria-expanded="true">Candidate Registration</a></li>
                  {{-- {{__('求職者')}} --}}
                 <li class="nav-item"><a class="nav-link {{($c_or_e == 'employer')? 'active':''}}" data-toggle="tab" href="#employer" aria-expanded="false">Employer Registration</a></li>
                 {{-- {{__('企業向け')}} --}}

             </ul>

         </div>

     <div class="userccount whitebg">
         <div class="tab-content">
             <div id="candidate" class="formpanel mt-0 tab-pane {{($c_or_e == 'candidate')? 'active':''}}">
                <div class="header-title">
                    <h4>Register With Bhalojob</h4>
                    <small> Register with the account bellow</small>
                </div>
                <div class="socialLogin pb-0 mb-0">
                    <p> 仕事をお探しの方に対する様々な就職 仕事をお探しの方に対する様々な就職
                    仕事をお探しの方に対する様々な就職 仕事をお探しの方に対する様々な就職 </p>

                    <div class="social-login d-block ">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="icon mb-2">
                                    <a href="{{ url('login/jobseeker/facebook') }}" class="fb">
                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                        <span>Register with Facebook </span>
                                    </a>
                                </div>
                                <div class="icon mb-2">
                                    <a href="{{url('login/jobseeker/google')}}" class="gp">
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
                        </div>
                    </div>  <hr>
                </div>

{{--                 <a href="{{ url('login/jobseeker/facebook')}}" class="fb"><i class="fab fa-facebook" aria-hidden="true"></i>asasasas</a>--}}

                <div class="row register-form justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('register') }}" class="form-horizontal" method="POST" >
                         {{ csrf_field() }}
    
                     <article>
                        <p> Or Register with your email </p>
                     </article>
    
    
                         <input type="hidden" name="candidate_or_employer" value="candidate" />
    
    
    
                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email"> <i class="fa fa-envelope" aria-hidden="true"></i> </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Your email address" aria-label="Username" aria-describedby="email">
                                
                                
                            </div>
                             @if ($errors->has('email')) <span class="help-block text-danger mb-2 d-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif 
    
                            <p class="text-center mb-3">Do You have Account?<a href="{{url('login')}}">Login</a></p>
                            <p class="text-left">Before accepting, Please read the <a class="text-red" href="#">Terms of Agreement.</a></p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input exampleCheck2" id="exampleCheck1" required style="margin-top:0.1rem">
                                <label class="form-check-label" for="exampleCheck1">I Accept The Terms of Agreement</label>
                              </div>
                            
    
                         <div class="submit-button">
                            <input type="submit" class="btn" value="Submit">
                         </div>
                      {{-- {{__('無料会員登録')}} --}}
                     </form>
                    </div>
                </div>
                     

             </div>

             <div id="employer" class="formpanel mt-0 tab-pane fade {{($c_or_e == 'employer')? 'active':''}}">

             <div class="header-title">
                    <h4> Register With Bhalojob</h4>
                    <small> Register with the account bellow </small>
                </div>
                <div class="socialLogin">
                    <p> 仕事をお探しの方に対する様々な就職 仕事をお探しの方に対する様々な就職
                    仕事をお探しの方に対する様々な就職 仕事をお探しの方に対する様々な就職 </p>
                    
                    <div class="col-md-4 m-auto"><button class="btn mt-3 text-capitalize">Employer Registration</button></div>

                    {{-- <div class="social-login">
                        <div class="icon">
                        <a href="{{ url('login/employer/google')}}" class="bg-danger">
                            <i class="fab fa-google" aria-hidden="true"></i>
                            <span> Google </span>
                        </a>
                        </div>
                        <div class="icon">
                        <a href="{{ url('login/employer/facebook')}}" class="fb">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <span> Facebook </span>
                        </a>
                        </div>
                      
                    </div> --}}
                </div>
                <div class="profile-edite user-profile-edit">
                        <div class="progress-bar d-none">
                            <div class="step">
                                <div class="bullet">
                                    <span>1</span>
                                </div>
                            </div>
                            <div class="step">
                                <div class="bullet">
                                    <span>2</span>
                                </div>
                            </div>
                            <div class="step">
                                <div class="bullet">
                                    <span>3</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="employee-res-pointer" id="erp1">1</div>
                            <div class="employee-res-pointer" id="erp2">2</div>
                            <div class="employee-res-pointer" id="erp3">3</div>
                        </div>
                        <div class="form-outer">
                             <form action="{{ route('company.submit_register') }}" method="POST" >
                                {{ csrf_field() }}
                                
                                <div class="form">
                                    
                                     <div class="page slide-page">
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control first_name" name="last_name" id="" aria-describedby="emailHelp" placeholder="Last Name">
                                                    
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First  Name</label>
                                                    <input type="text" class="form-control last_name" id=""  name="first_name" placeholder="Enter Last Name">
                                                    
                                                  </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Company Email address</label>
                                                <input type="email"  name="email" class="form-control exampleInputEmail1"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company email">
                                              </div>
                                            </div>
                                        </div>
                                        <p class="text-center my-3">Do You have Account?<a href="{{url('login')}}">Login</a></p>
                                        <p class="text-left">Before accepting, Please read the <a class="text-red" href="#">Terms of Agreement.</a></p>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input exampleCheck2" id="exampleCheck2" style="margin-top:0.1rem" required>
                                            <label class="form-check-label" for="exampleCheck2">I Accept The Terms of Agreement</label>
                                            
                                          </div>
                                          <span id="checkboxerror"></span>
                                      
                                        <div class="field next_button">
                                          <button class="firstNext next" onclick="showProcess2()">
  Next <i class="fa fa-arrow-right"></i>
</button>
                                        </div>
                                    
                                    </div>
                                @php 
                                    $state = App\State::where('is_active', 1)->get();
                                @endphp

                                <div class="page">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="company_name">Company  Name</label>
                                                <input type="text" class="form-control company-name" id="" name="name" placeholder="Enter Company Name">
                                                
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="state_id">Work location</label>
                                                <select class="form-control state_id" name="state_id" id="" class=="state_id">
                                                    <option value="">Select Location</option>
                                                    @foreach($state as $data)
                                                        <option value="{{ $data->state_id }}">{{ $data->state }}</option>
                                                    @endforeach
                                                </select>
                                                
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" class="form-control" id="" name="designation" placeholder="Enter Designation">
                                             </div>
                                        </div>
                                    </div>
                                    <div class="field btns next_button">
                                        <button class="prev-1 prev" onclick="showProcess1()"><i class="fa fa-arrow-left"></i> Previous</button>
                                          <button class="next-1 next" onclick="showProcess3()">Next <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                   
                                </div>

                                <div class="page">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Telephone Number</label>
                                                <input type="text" class="form-control" id="" name="phone" placeholder="Enter Telephone Number">
                                                
                                             </div>
                                            <div class="terms my-4">
                                                <p><small><b>I hereby confirmed that i read, understand and agreed to bhalojob <a class="red-text" href="{{url('terms-&-condition')}}">Terms & Conditions</a> and <a class="red-text" href="#">Privacy Policy.</a> </b></small></p>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="field btns next_button">
                                        <button class="prev-2 prev" onclick="showProcess2()"><i class="fa fa-arrow-left"></i> Previous</button>
                                        <button class="next-2" type="submit">Next <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
    
                 {{--<form action="{{ route('company.register') }}" class="form-horizontal" method="POST" >
                     {{ csrf_field() }}

                     <article>
                         <p> Register with your email address </p>
                     </article>


                     <input type="hidden" name="candidate_or_employer" value="employer" />



                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text" id="email"> <i class="fa fa-envelope" aria-hidden="true"></i> </span>
                         </div>
                         <input type="email" name="email" class="form-control" placeholder="Your email address" aria-label="Username" aria-describedby="email">
                     </div>
                    @if ($errors->has('email')) <span class="help-block text-danger mb-2 d-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif 


                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text" > <i class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
                         </div>
                         <input type="password" name="password" class="form-control" placeholder="{{__('Password')}}"  required="required" aria-label="Username" aria-describedby="{{__('Password')}}" value="">

                     </div>
                     @if ($errors->has('password')) <span class="help-block text-danger mb-2 d-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif 
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text" > <i class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
                         </div>

                         <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
                     </div>

                     <div class="submit-button">
                         <input type="submit" class="btn" value="Submit">
                         {{__('無料会員登録')}} 
                     </div>

                 </form>--}}
                        </div>
                    </div>
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

@include('includes.footer')

@endsection
@push('scripts')
<script>
     initMultiStepForm();
     function initMultiStepForm() {
            const progressNumber = document.querySelectorAll(".step").length;
            const slidePage = document.querySelector(".slide-page");
            const submitBtn = document.querySelector(".submit");
            // const progressText = document.querySelectorAll(".step p");
            // const progressCheck = document.querySelectorAll(".step .check");
            const bullet = document.querySelectorAll(".step .bullet");
            const pages = document.querySelectorAll(".page");
            const nextButtons = document.querySelectorAll(".next");
            const prevButtons = document.querySelectorAll(".prev");
            const stepsNumber = pages.length;

            if (progressNumber !== stepsNumber) {
                console.warn(
                    "Error, number of steps in progress bar do not match number of pages"
                );
            }

            document.documentElement.style.setProperty("--stepNumber", stepsNumber);

            let current = 1;

            for (let i = 0; i < nextButtons.length; i++) {
                nextButtons[i].addEventListener("click", function (event) {
                    event.preventDefault();


                    const form = this.parentElement.parentElement;
                    const formId = form.getAttribute('id');
                    console.log("form id", formId);
                    const inputs = form.querySelectorAll('input');
                    const formData = {};
                    for (let j = 0; j < inputs.length; j++) {
                        formData[inputs[j].name] = inputs[j].value;
                    }

                    inputsValid = validateInputs(this);
                    // inputsValid = true;

                    if (inputsValid) {

                        if (formId == "personalInformationForm") {
                            // submitProfileEducationForm();
                        } else {

                        }


                        slidePage.style.marginLeft = `-${
                            (100 / stepsNumber) * current
                        }%`;
                        bullet[current - 1].classList.add("active");
                        // progressCheck[current - 1].classList.add("active");
                        // progressText[current - 1].classList.add("active");
                        current += 1;
                    }
                });
            }

            for (let i = 0; i < prevButtons.length; i++) {
                prevButtons[i].addEventListener("click", function (event) {
                    event.preventDefault();
                    slidePage.style.marginLeft = `-${
                        (100 / stepsNumber) * (current - 2)
                    }%`;
                    bullet[current - 2].classList.remove("active");
                    // progressCheck[current - 2].classList.remove("active");
                    // progressText[current - 2].classList.remove("active");
                    current -= 1;
                });
            }
            // submitBtn.addEventListener("click", function () {

            //     bullet[current - 1].classList.add("active");
            //     progressCheck[current - 1].classList.add("active");
            //     progressText[current - 1].classList.add("active");
            //     current += 1;
            //     setTimeout(function () {
                  
            //         //location.reload();
            //     }, 800);
            // });

            function validateInputs(ths) {
                let inputsValid = true;

                const inputs =
                    ths.parentElement.parentElement.querySelectorAll("input");
                for (let i = 0; i < inputs.length; i++) {
                    const valid = inputs[i].checkValidity();
                    if (!valid) {
                        inputsValid = false;
                        inputs[i].classList.add("invalid-input");
                    } else {
                        inputs[i].classList.remove("invalid-input");
                    }
                }
                return inputsValid;
            }
        }
        function showPage(showdiv) {
            $(showdiv).show();
        }
        
        const showProcess1 = () => {
  document.getElementById("erp1").style.backgroundColor = "#d71921";
  document.getElementById("erp1").style.color = "white";
  document.getElementById("erp2").style.backgroundColor = "#aeaeae";
  document.getElementById("erp2").style.color = "black";
  document.getElementById("erp3").style.backgroundColor = "#aeaeae";
  document.getElementById("erp3").style.color = "black";
};

const showProcess2 = () => {
    var exampleCheck2 = document.getElementById("exampleCheck2");
    var emailElement = document.getElementsByClassName("exampleInputEmail1")[0];
    var firstNameElement = document.getElementsByClassName("first_name")[0];
    var lastNameElement = document.getElementsByClassName("last_name")[0];
    
    if (exampleCheck2.checked == false) {
        document.getElementById("checkboxerror").innerHTML =
            "This file is required";
    } else {
        document.getElementById("checkboxerror").innerHTML = "";
    }

    if (
        emailElement.value !== "" &&
        firstNameElement.value !== "" &&
        lastNameElement.value !== "" &&
        exampleCheck2.checked !== false
    ) {
        document.getElementById("erp1").style.backgroundColor = "#aeaeae";
        document.getElementById("erp1").style.color = "black";
        document.getElementById("erp2").style.backgroundColor = "#d71921";
        document.getElementById("erp2").style.color = "white";
        document.getElementById("erp3").style.backgroundColor = "#aeaeae";
        document.getElementById("erp3").style.color = "black";
    }
};

const showProcess3 = () => {
  if (
    document.getElementsByClassName("company-name").value != "" ||
    document.getElementsByClassName("state_id").value != "" ||
    document.getElementsByClassName("designation").value != ""
  ) {
    document.getElementById("erp1").style.backgroundColor = "#aeaeae";
    document.getElementById("erp1").style.color = "black";
    document.getElementById("erp2").style.backgroundColor = "#aeaeae";
    document.getElementById("erp2").style.color = "black";
    document.getElementById("erp3").style.backgroundColor = "#d71921";
    document.getElementById("erp3").style.color = "white";
  }
};

</script>
@endpush