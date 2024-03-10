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
                        <div class="progress-bar">
                            <div class="step">
                                <p> Personal </p>
                                <div class="bullet">
                                    <span>1</span>
                                </div>
                                <div class="check fas fa-check"></div>
                            </div>
                            <div class="step">
                                <p>Profile Image</p>
                                <div class="bullet">
                                    <span>2</span>
                                </div>
                                <div class="check fas fa-check"></div>
                            </div>
                            <div class="step">
                                <p> Education </p>
                                <div class="bullet">
                                    <span>3</span>
                                </div>
                                <div class="check fas fa-check"></div>
                            </div>
                            <div class="step">
                                <p> Experience </p>
                                <div class="bullet">
                                    <span>4</span>
                                </div>
                                <div class="check fas fa-check"></div>
                            </div>
                            <div class="step">
                                <p> Language </p>
                                <div class="bullet">
                                    <span>5</span>
                                </div>
                                <div class="check fas fa-check"></div>
                            </div>
                            <div class="step">
                                <p> Certificate </p>
                                <div class="bullet">
                                    <span>6</span>
                                </div>
                                <div class="check fas fa-check"></div>
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