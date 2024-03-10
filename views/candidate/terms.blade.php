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
        min-height: 100vh;
        position:relative;
    }
    .copyright{
        /*position: absolute;*/
        /*bottom: 0;*/
            /*background: transparent;*/
    }
    .copyright p{
        font-size:12px;margin-bottom: 0;color: #000;line-height: 16px;
    }
    .text-red{
        color: #DB3036;
    }
    .bg-less-red{
        background: #FBE9E9;
    }
    .bg-transparent{background:transparent;}
    .terms-content h3{
            font-size: 20px;
    margin: 10px 0;
    }
    .userbtns {
    display: flex;
    align-items: center; /* Center items vertically */
    padding: 10px; /* Add some padding for spacing */
}

.back_btn {
    margin-right: 10px; /* Adjust margin for spacing between the back button and the logo */
}

.logo {
    margin: 0 auto; /* Center the logo horizontally */
}

.logo img {
    max-height: 50px; /* Set a maximum height for the logo */
}
</style>
@endpush
@section('content')

<!-- Header start -->

<!-- Header end -->



<div class="authpages">

    <div class="container">

       <div class="row justify-content-center">
            <div class="col-lg-6">
            @include('flash::message')
    
    
    
                <div class="useraccountwrapcontent">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="userbtns">
                                <div class="back_btn">
                                    <a><i class="fa-solid fa-arrow-rotate-left"></i></a>
                                </div>
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ @$siteSetting->site_logo }}" alt="{{ @$siteSetting->site_name }}" /></a>
                                </div>
                           </div>
                        </div>
                    </div>
                            
                   <div class="user_main_container bg-less-red row">
                       <div class="col-md-12 p-3">
                       <h1 class="text-center mb-4">Terms and Condition</h1>
                       <div class="terms-content mb-5">
                           <h3>1. Introduction</h3>
                            These Terms and Conditions ("Terme) govern your use of the
                            Bhalojob.com application ("App"), operated by thalojob.com
                            By using this App you agree to comply with these Terms
                            If you disagree with any part of these Terms, please refrain
                            from using the App
                            <h3>2. User Eligibility</h3>
                            Users must be at least 18 years old to access and use the
                            App's services.
                            Users wamant that the information provided is accurate and
                            complete
                            <h3>3. User Conduct</h3>
                            Users are responsible for maintaining the confidentiality of
                            their account information.
                            Users must not engage in legal or prohibited activities while
                            using the App
                            <h3>4. Intellectual Property</h3>
                            All content, trademarks, logos, and intelectual property rights
                            displayed on the App are owned by the Company. Users are
                            prohibited from reproducing, distributing, or using any content
                            without authorization
                            <h3>5. Privacy Policy</h3>
                            The App's Privacy Policy outlines how we collect, use, and
                            protect user data. By using the App, users agree to the
                            Privacy Policy
                            <h3>6. Termination</h3>
                            The Company reserves the right to suspend or terminate
                            access to the App if users violate the Terms
                            <h3>7. Limitation of Liability</h3>
                            The Company shall not be liable for any indirect, incidental,
                            special, or consequential damages resulting from the use or
                            inability to use the App
                            <h3>8. Governing Law</h3>
                            These Terms are governed by and construed in accordance
                            with the laws of [Your Jurisdiction, and any disputes will be
                            subject to the exclusive jurisdiction of the courts in
                            Your Jusdiction
                            <h3>9. Modifications</h3>
                            The Company reserves the right to modify or replace these
                            Terms at any time. Users are advised to review these Terms
                            periodically for any changes
                            <h3>10. Contact Information</h3>
                            For questions or concerns regarding these Terms, please
                            contact us at Contact.
                       </div>
                       </div>
                       <div class="col-md-12 p-0">
                           <div class="copyright bg-transparent">
                                <p>Copyright {{date('Y')}} @<span class="text-red">bhalojob.com</span></p>
                                <p>All rights Reserve</p>
                            </div>
                       </div>
                   </div>
                    
                </div>
                
            </div>
        </div>

        <!-- <div class="col-lg-7">
        <div class="loginpageimg"><img src="{{asset('/')}}images/login-page-banner.png" alt=""></div>
        </div> -->

       <!--</div>-->



    </div>

</div>


@endsection