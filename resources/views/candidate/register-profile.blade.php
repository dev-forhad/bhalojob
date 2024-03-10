@extends('layouts.app')

@section('content')

<!-- Header start -->

@include('includes.header')

<!-- Header end -->



<div class="authpages">

    <div class="container">

       <div class="row">
        <div class="col-lg-12">
        @include('flash::message')



        <div class="useraccountwrap">


            <div class="userccount whitebg">
        
                 <div class="profile-edite user-profile-edit">
                    <h2 class="mb-4">Profile Creation: Step <span id="stepCounter">1</span> of 9</h2>

                    <div class="form-outer">
                        <div class="form">
                            <div class="page slide-page">
                                <form action="{{route('user.profile')}}" method="post" id="personalInformationForm"
                                          enctype="multipart/form-data">
                                    @csrf
                                    @include('candidate.inc.personal_information')
                                    <div class="field next_button">
                                        <button type="submit" onclick="submitPersonalInformationForm()"   class="firstNext next"> Next <i class="fa fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="page">
                                <form action="" method="post" id="profileimage"
                                      enctype="multipart/form-data">
                                    @csrf
                                    
                                        @include('candidate.inc.step2')
                                    <div class="field btns next_button ">
                                            <button class="prev-1 prev"><i class="fa fa-arrow-left"></i> Previous</button>
                                            <button class="next-1 next">Next <i class="fa fa-arrow-right"></i></button>
                                        </div>
                                </form>
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

</div>

@include('includes.footer')

@endsection
@push('scripts')
<script>


        //step stert
        initMultiStepForm();

        function initMultiStepForm() {
            const progressNumber = document.querySelectorAll(".step").length;
            const slidePage = document.querySelector(".slide-page");
            const submitBtn = document.querySelector(".submit");
            const progressText = document.querySelectorAll(".step p");
            const progressCheck = document.querySelectorAll(".step .check");
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
                        progressCheck[current - 1].classList.add("active");
                        progressText[current - 1].classList.add("active");
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
                    progressCheck[current - 2].classList.remove("active");
                    progressText[current - 2].classList.remove("active");
                    current -= 1;
                });
            }
            submitBtn.addEventListener("click", function () {

                bullet[current - 1].classList.add("active");
                progressCheck[current - 1].classList.add("active");
                progressText[current - 1].classList.add("active");
                current += 1;
                
            });

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

        //end step

        function showPage(showdiv) {
            $(showdiv).show();
        }
        </script>
@endpush