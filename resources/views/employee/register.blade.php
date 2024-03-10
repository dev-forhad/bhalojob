<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thank you</title>
    <link rel="stylesheet" href="{{asset('css/employee_style.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  </head>
  <body>

    <section>
        <div>
            <!-- nav header  -->
            <div class="col-md-12 py-2 text-center mt-3">
                <div
                    class="language-toggle"
                    role="group"
                    aria-label="Language Selector"
                >
                <input class="form-control" type="radio" id="jpRadio" name="language" value="jp" />
                <label  for="jpRadio">JP</label>
        
                <input class="form-control" type="radio" id="enRadio" name="language" value="en" checked />
                <label  for="enRadio">EN</label>
        
                <!--<input class="form-control" type="radio" id="bnRadio" name="language" value="bn" />-->
                <!--<label for="bnRadio">BN</label>-->
                </div>
            </div>

            <section class="screen py-4 d-flex align-content-center justify-content-center ">

                <section class="col-10 m-auto ">
                    <div class="w-100 row mt-5">
                        <a href="{{url('/')}}" class="m-auto"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ @$siteSetting->site_logo }}" class="col-12 m-auto " alt="{{ @$siteSetting->site_name }}" /></a>
                    </div>

                    <div>
                        <p class="choose-cetagory-btn mx-auto w-75">Employer Registration</p>
                    </div>

                    <div class="flex pt-4 pb-2">
                        <div class="employee-res-pointer" id="employee-res-pointer1">1</div>
                        <div class="employee-res-pointer" id="employee-res-pointer2">2</div>
                        <div class="employee-res-pointer" id="employee-res-pointer3">3</div>
                    </div>

                    <!-- form start here  -->
                    <form action="{{ route('company.submit_register') }}" method="post">
                        @csrf

                        <!-- form body  -->

                        <!-- step one  -->
                        <div id="em-res-step-one">
                            <div>
                                <label class="fw-bolder d-block input-label employee-input-label" for="lastname">Last Name</label>
                                <input class=" form-control input-box mb-3 employee-res-input-border" id="lastname" value="{{old('last_name')}}" type="text" name="last_name" placeholder="Last Name">
                              </div>

                              <div>
                                <label class="fw-bolder d-block input-label employee-input-label" for="firstname">First Name</label>
                                <input class="  form-control input-box mb-3 employee-res-input-border" id="firstname" value="{{old('first_name')}}" name="first_name" type="text" placeholder="First Name">
                              </div>

                              <div>
                                <label class="fw-bolder d-block input-label employee-input-label" for="company-email">Company email address</label>
                                <input class=" form-control input-box mb-3 employee-res-input-border" id="company-email" value="{{old('email')}}" name="email" type="email" placeholder="Email">
                              </div>

                              <div class="text-center">
                                <button class="employee-next-btn" id="employeeResOne" type="button">Next</button>
                            </div>

                            <div class="not-account-on-login flex ">
                                <p class=" pt-3">Do you have account?</p>
                                <a class="d-block px-3 " href="{{url('employer-login')}}">Login</a>
                            </div>
                        </div>

                        <!-- step two  -->
                         @php 
                            $state = App\State::where('is_active', 1)->get();
                        @endphp
                        <div id="em-res-step-two">
                            <div>
                                <label class="fw-bolder d-block input-label employee-input-label" for="company-name">Company Name</label>
                                <input class=" form-control input-box mb-3 employee-res-input-border" id="company-name" value="{{old('name')}}" type="text" name="name" placeholder="Company Name">
                            </div>

                            <div>
                                <label class="fw-bolder d-block input-label employee-input-label" for="location">Work Location</label>
                                <select class=" form-control input-box mb-3 employee-res-input-border" name="state_id">
                                                    <option value="">Select Location</option>
                                                    @foreach($state as $data)
                                                        <option value="{{ $data->state_id }}">{{ $data->state }}</option>
                                                    @endforeach
                                                </select>
                            </div>

                            <div>
                                <label class="fw-bolder d-block input-label employee-input-label" for="designation">Designation</label>
                                <input class=" form-control input-box mb-3 employee-res-input-border" id="designation" value="{{old('designation')}}" type="text" placeholder="Designation" name="designation">
                            </div>

                            <div class="text-center">
                                <button class="employee-next-btn" id="employeeRestwo" type="button">Next</button>
                            </div>

                            <div class="text-center ">
                                <button class="text-decoration-none border-0 bg-none my-4 text-dark" id="preemployeeRestwo" type="button">return</button>
                            </div>

                        </div>

                        <!-- step three  -->
                        <div id="em-res-step-three">
                            <div>
                                <label class="fw-bolder d-block input-label employee-input-label" for="number">Telephone Number</label>
                                <input class=" form-control input-box mb-3 employee-res-input-border" id="number" value="{{old('phone')}}" name="phone" type="text" placeholder="Telephone Number">
                            </div>
 
                            <div class="choose-cetagory-p pb-4">
                                <p>I hereby confirm that i read, understand and agreed to bhalojob and <a href="/">Terms & Conditions</a> and <a href="/">Privacy Policy</a></p>
                            </div>


                            <div class="text-center">
                                <button class="employee-next-btn" type="submit">Next</button>
                            </div>

                            <div class="text-center ">
                                <button class="text-decoration-none border-0 bg-none my-4 text-dark" id="preemployeeResthree" type="button">return</button>
                            </div>
                        </div>

                    </form>




                </section>

            </section>

            
            <!-- footer  -->
            <div class="cetagory-footer">
                <p>Copyright 2024 @bhalojob.com</p>
                <p>All Rights Reserved</p>
            </div>
          </div>
        </section>

    <script src="{{asset('js/employee.js')}}"></script>
    <!-- bootstrap 4 script  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>
