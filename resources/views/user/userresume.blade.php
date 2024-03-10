@extends('layouts.app')

@section('content')

    <!-- Header start -->

    @include('includes.header')
    <!-- Header end -->

    <!-- Inner Page Title start -->

    @include('includes.inner_page_title', ['page_title'=>__('Print Resume')])

    <?php $true = FALSE; ?>


    <?php

    if (Auth::guard('company')->user()) {

        $package = Auth::guard('company')->user();

        if (null !== ($package)) {

            $array_ids = explode(',', $package->availed_cvs_ids);

            if (in_array($user->id, $array_ids)) {

                $true = TRUE;

            }

        }

    }

    //  dd();

     if(!empty($japaneseCv)):
    if ($japaneseCv->personal_information!=null || $japaneseCv->education_history!=null || $japaneseCv->working_experience!=null || $japaneseCv->language_certification!=null || $japaneseCv->other_certification!=null || $japaneseCv->jp_address!=null):
        $personalInfo = json_decode($japaneseCv->personal_information);
        // dd($personalInfo);
        $educationInfo = json_decode($japaneseCv->education_history);
        $workingInfo = json_decode($japaneseCv->working_experience, true);
        
        $languageInfo = json_decode($japaneseCv->language_certification);
        $certificateInfo = json_decode($japaneseCv->other_certification);
        $jp_address = json_decode($japaneseCv->jp_address);
    endif;
    endif;
       
    // Personal Information Section
        // $personalInfo = $user;
        $genderId = @$personalInfo->gender_id;
        
        $birthYear = @$user->birth_year;
        $birthMonth = @$user->birth_month;
        $birthDay = @$user->birth_day;
        $maritalStatusId = @$user->marital_status_id;
        $CountryID = @$user->country_id;
        $nationalityId = @$user->nationality_id;
        $gender = App\Gender::where('gender_id', $user->gender_id)->first();
      
        
        $Byear = App\Year::where('id', $birthYear)->first();
        $Bmonths = DB::table('months')->where('id', $birthMonth)->first();
        $Bdays = DB::table('days')->where('id', $birthDay)->first();
        $Mstatus = App\MaritalStatus::where('marital_status_id', $maritalStatusId)->first();
        $country = App\Country::where('country_id', $CountryID)->first();
        $nationality = App\Country::where('country_id', $nationalityId)->first();
        // Education Information Section SSC  
        $SSCentranceYearId=@$educationInfo->ssc->entrance_year;
        $SSCentrancemonthID=@$educationInfo->ssc->entrance_month;
        $SSCentrancePassYearId=@$educationInfo->ssc->pass_year;
        $SSCentrancePassMonthId=@$educationInfo->ssc->pass_month;
        $SSCentranceYear = App\Year::where('id', $SSCentranceYearId)->first();
        $SSCentranceMonth = App\Models\Month::where('id', $SSCentrancemonthID)->first();
        $SSCentrancePassYear = App\Year::where('id', $SSCentrancePassYearId)->first();
        $SSCentrancePassMonth = App\Models\Month::where('id', $SSCentrancePassMonthId)->first();

        // Education Information Section HSC
        $HSCentranceYearId=@$educationInfo->hsc->entrance_year;
        $HSCentrancemonthID=@$educationInfo->hsc->entrance_month;
        $HSCentrancePassYearId=@$educationInfo->hsc->pass_year;
        $HSCentrancePassMonthId=@$educationInfo->hsc->pass_month;
        $HSCentranceYear = App\Year::where('id', $HSCentranceYearId)->first();
        $HSCentranceMonth = App\Models\Month::where('id', $HSCentrancemonthID)->first();
        $HSCentrancePassYear = App\Year::where('id', $HSCentrancePassYearId)->first();
        $HSCentrancePassMonth = App\Models\Month::where('id', $HSCentrancePassMonthId)->first();

      // Education Information Section University
        $universityentranceYearId=@$educationInfo->university->entrance_year;
        $universityentrancemonthID=@$educationInfo->university->entrance_month;
        $universityentrancePassYearId=@$educationInfo->university->pass_year;
        $universityentrancePassMonthId=@$educationInfo->university->pass_month;
        $universityentranceYear = App\Year::where('id', $universityentranceYearId)->first();
        $universityentranceMonth = App\Models\Month::where('id', $universityentrancemonthID)->first();
        $universityentrancePassYear = App\Year::where('id', $universityentrancePassYearId)->first();
        $universityentrancePassMonth = App\Models\Month::where('id', $universityentrancePassMonthId)->first(); 
        $user_img= App\User::find(Auth::user()->id);
        $education = $user->profileEducation;
        $experinceData = $user->profileExperience; 
        $profileSkills = $user->profileSkills;
        $profiledrivingSkills = $user->profiledrivingSkills;
        $bday = @$Byear->year_value.'-'.@$Bmonths->eng_title.'-'.@$Bdays->eng_title;
        $age_total = '';
        if($bday){
           $dateTime = DateTime::createFromFormat('Y-F-jS', $bday);
            $newDateString = $dateTime->format('Y-m-d');
            
            $age_total = MiscHelper::calculateAgeToday($newDateString); 
        }
        
        

    ?>
  
  

<style>
      .table-responsive tbody tr:first-child {
          border: none!important;
        }
        .candidate-cv{
                 position:relative;
                 z-index: 10;
            }

            .watermark{
                   position:absolute;
                   position: absolute;
                    top: 10%;
                    left: 99px;  
            }
    
        /*.candidate-cv {*/
        /*    box-shadow: none !important;*/
        /*    border: none !important;*/
        /*}*/
</style>

    <div class="listpgWraper">

        <div class="container">
            @include('flash::message')
            <div class="row">
          
                @include('includes.user_dashboard_menu')

                <div class="col-md-9 col-sm-8">
                    <div class="cv-box-design">
                        <div id="printableArea">
                            <div class="candidate-cv">
                                <div class="container">
                                  {{--<div class="watermark"> <img src="{{ asset('admin_assets/watermark2.png') }}" alt="alt"> </div>    --}}
    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                                  
                                            <table class="table-responsive borderremove">
                                                <tbody>
                                                <tr>
                                                    <td colspan="5" style="border-top:0;border-right:0;padding:0px 10px;">
                                                        <div style="display: flex; justify-content: space-between;">
                                                            <h5 class="mb-0">バイオデータ</h5>
                                                            <h5 class="mb-0">{{ \Carbon\Carbon::now()->format('Y-m-d') }}</h5>
                                                        </div>
                                                    </td>
                                                    <td style="width:30%!important"   rowspan="4" class="border-left-none border-right-none border-top-none">
                                                         <img style="display:block;border: 1px dotted;padding: 7px;" src="{{ asset('user_images/'.$user_img->image) }}" alt="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:20%!important"  style="border:none;" class="border-bottom-dotted border-right-none">名前</td> <!--Name--><!--border-bottom-dotted border-top-solid-->
                                                    <td  style="width:30%!important"  style="border:none; text-align: right;" class="border-bottom-dotted border-left-none border-right-dotted">{{ @$personalInfo->first_name }} {{ @$personalInfo->last_name}}</td>
                                                    <td style="text-align: center;" colspan="3" rowspan="2" class="border-left-none">{{$gender->jp_gender ?? ''}}</td>
                                                </tr>
    
                                                <tr>
                                                    <td class="border-top-none border-right-none"> 名前 </td> <!--Name-->
                                                    <td class="border-left-none border-right-dotted border-top-none">{{ @$personalInfo->first_name_alt}} {{ @$personalInfo->last_name_alt}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="border-right-none">生年月日</td> <!--Dob-->
                                                    <td colspan="4" style="text-align:right" class="border-left-none">{{@$Byear->jp_year_value}} - {{@$Bmonths->jp_title}} - {{@$Bdays->jp_title}} ({{@$age_total}})</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td width=""> 住所 </td> <!--Address-->
                                                    <td colspan="4">{{$jp_address->jp_state_name??''}} - {{$jp_address->jp_city_name ?? ''}} - {{$user->bd_village}}</td>
                                                    <td>携帯番号</td> <!--Mobile No-->
                                                </tr>
                                                <tr> 
                                                    <td colspan="5" width="50%!important">現住所 <!--Present Address--> (郵便番号) {{$user->bd_postal_code}}</td> <!--Postal code-->
                                                    <td>{{$user->phone ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" rowspan="2"> 地区 <!--District-->: {{$jp_address->jp_state_name??''}}  タナ <!--Thana-->: {{$jp_address->jp_city_name ?? ''}} 村 <!--Village-->: {{$user->bd_village}} ハウスナンバー <!--House No-->: {{$user->bd_address}}  </td>
                                                    <td>電子メールアドレス</td> <!--Email Address-->
                                                </tr>
                                                <tr>
                                                    <td>{{$user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td width=""> 住所 </td> <!--Address-->
                                                    <td colspan="4">{{$jp_address->jp_state_name??''}} - {{$jp_address->jp_city_name ?? ''}} - {{$user->bd_village}}</td>
                                                    <td>国籍</td> <!--Nationality-->
                                                </tr>
                                                <tr>
                                                    <td colspan="5" width="50%!important">現住所 <!--Present Address--> (郵便番号) {{$user->bd_postal_code}}</td> <!--Postal code-->
                                                    <td>{{ @$personalInfo->jp_nationality_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" rowspan="2" style="line-height: 59px;"> 地区 <!--District-->: {{$jp_address->jp_state_name??''}}  タナ <!--Thana-->: {{$jp_address->jp_city_name ?? ''}} 村 <!--Village-->: {{$user->bd_village}} ハウスナンバー <!--House No-->: {{$user->bd_address}}  </td>
                                                </tr>
                                                <tr></tr>
                                                <tr class="border-bottom-solid border-top-solid">
                                                    <td style="font-weight: 600;">年</td><!--Year-->
                                                    <td style="font-weight: 600;">月</td><!--Month-->
                                                    <td style="width:60%; font-weight: 600" colspan="4">学歴</td><!--Educational History-->
                                                </tr>
                                                @foreach($education as $data)
                                                <tr>
                                                    <td>{{$data->getEntrance('jp_year_value')}}</td>
                                                    <td>{{$data->entranc_month->jp_title}}</td>
                                                    <td style="width:60%" colspan="4">
                                                        <div class="w-100">
                                                            <div class="w-50 float-left">
                                                                {{ @collect($educationInfo)[$data->id]->institution_name }}
                                                            </div>
                                                            <div class="w-50 float-right">
                                                                {{ @collect($educationInfo)[$data->id]->major??'' }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{$data->getPass('jp_year_value')}}</td>
                                                    <td>{{$data->pass_months->jp_title}}</td>
                                                    <td style="width:60%" colspan="4">{{ @collect($educationInfo)[$data->id]->institution_name??'' }}	</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6"></td>
                                                </tr>
                                                @if(count($experinceData) > 0)
                                            
                                                <tr class="border-bottom-solid border-top-solid">
                                                    <td style="font-weight: 600;">年</td><!--Year-->
                                                    <td style="font-weight: 600;">月</td><!--Month-->
                                                    <td style="width:60%; font-weight: 600" colspan="4">実務経験</td><!--Work Experience-->
                                                </tr>
                                                
                                                @foreach($experinceData as $exper)
                                                @php
                                                    $slug = $exper->slug;
                                                    $workExpe =  $workingInfo[$slug] ?? '';
                                                @endphp
    
                                                <tr>
                                                    <td>{{$exper->entryYear->jp_year_value }}</td>
                                                    <td>{{$exper->entryMonth->jp_title}}</td>
                                                    <td style="width:60%" colspan="4">
                                                        <div class="w-100">
                                                            <div class="w-50 float-left">
                                                                {{$workExpe['company']??''}}
                                                            </div>
                                                            <div class="w-50 float-right">
                                                                {{$workExpe['title']??''}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    @if($exper->is_currently_working)
                                                        <td>{{$workExpe['is_currently_working'] ?? 'Currently Working'}}</td>
                                                        <td>&nbsp;</td>
                                                    @else
                                                    <td>{{$exper->reYear->jp_year_value ?? '今、働いている'}}</td>
                                                    <td>{{$exper->reMonth->jp_title ?? '今、働いている'}}</td>
                                                    @endif
                                                    <td style="width:60%" colspan="4">{{ $workExpe ? $workExpe['company'] : '' }}	</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                <tr>
                                                    <td colspan="6"></td>
                                                </tr>
                                                @if(count($profileSkills) > 0 || count($profiledrivingSkills) > 0)
                                                <tr class="border-bottom-solid border-top-solid">
                                                    <td style="font-weight: 600;">年</td><!--Year-->
                                                    <td style="font-weight: 600;">月</td><!--Month-->
                                                    <td style="width:60%; font-weight: 600" colspan="4">認証</td><!--Certification-->
                                                </tr>
                                                
                                                @foreach($profiledrivingSkills as $skill)
                                                <tr>
                                                   <td>{{$skill->getPass('jp_year_value')}}</td>
                                                   <td>{{$skill->getMonth('jp_title')}}</td>
                                                   <!--<td style="width:60%" colspan="4">{{$skill->categoryName('eng_title')}}</td>-->
                                                   <td style="width:60%" colspan="4">運転免許証</td>
                                                </tr>
                                                @endforeach
                                                @foreach($profileSkills as $skill)
                                                <tr>
                                                   <td>{{$skill->getPass('jp_year_value')}}</td>
                                                   <td>{{$skill->getMonth('jp_title')}}</td>
                                                   <td style="width:60%" colspan="4">{{$skill->getLangtype('jp_title')}}</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                {{--@if (isset($user) && count($user->profiledrivingSkills))
                                                <tr>
                                                    <td style="font-weight: 600;">名前</td><!--Name-->
                                                    <td style="font-weight: 600;">タイトル</td><!--Title-->
                                                    <td style="width:60%; font-weight: 600" colspan="4">タイプ</td><!--Type-->
                                                </tr>
                                                 @foreach($user->profiledrivingSkills as $skill)
                                                 <tr>
                                                    <td>運転免許証</td><!--Driving Lincense-->
                                                    <td>{{$skill->dclass_Name('class_name')}}</td>
                                                    <td style="width:60%" colspan="4">{{$skill->categoryName('eng_title')}}</td>
                                                </tr>
                                                 @endforeach
                                                @endif--}}
                                                <tr>
                                                    <td colspan="6"></td>
                                                </tr>
                                                <tr class="border-top-solid">
                                                    <td colspan="4">自己紹介（趣味、得意なこと、やる気）</td><!--Self Introduction(Hobbies,Strength,good at, motivation)-->
                                                    <td>配偶者の有無</td><!--Marital Status-->
                                                    <td >{{@$Mstatus->jp_marital_status}}</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="5" colspan="4">{{@$personalInfo->jp_self_summary}}</td>
                                                    <td>子供たち</td><!--Children-->
                                                    <td>{{$user->has_children == 'yes'?'はい':'いいえ'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>子供の数</td><!--No Of Children-->
                                                    <td>{{$user->bd_children}}</td>
                                                </tr>
                                                @foreach($user->profileLanguages as $language)
                                                <tr>
                                                    <td style="width:110px; display:flex;" class="border-0">{{$language->getLanguage('native')}} レベル </td>
                                                    <td>{{$language->getLanguageLevel('jp_level')}}</td>
                                                </tr>
                                                @endforeach
                                                
                                                <tr>
                                                    <td>母国語</td><!--Mother Tongue-->
                                                    <td>　{{ @$personalInfo->jp_mother_tongue }}	</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3" style="text-align: center;">
                        <input style="" type="button" onclick="printDiv('printableArea')" class="btn btn-primary"
                               value="Print Resume"/>
                               
                        <input style="" type="button" id="downloadButton" class="btn btn-primary" value="Download"/><!--Print Resume 履歴書の印刷-->
                               <!-- Or <span>Download</span> -->
                    </div>
                </div>
            </div>
        </div>



        @include('includes.footer')

        @endsection

        @push('styles')

            <style type="text/css">

                .formrow iframe {

                    height: 78px;

                }

            </style>

        @endpush

        @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
        <script>
            // Use jQuery to wait for the document to be ready
            $(document).ready(function() {
                // Ensure that html2pdf is initialized before using it
                if (typeof html2pdf !== 'undefined') {
                    // Attach click event handler to the button
                    $('#downloadButton').on('click', function() {
                        // Get the HTML element you want to convert to PDF
                        const element = document.getElementById('printableArea');
    
                        // Options for pdf generation
                        const options = {
                            margin: 5,
                            filename: 'document.pdf',
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { scale: 3 },
                            jsPDF: { unit: 'mm', format: 'a3', orientation: 'portrait' }
                        };
    
    					html2pdf(element, options);
                        // Use html2pdf library to generate PDF
                        // html2pdf().from(element).set(options).outputPdf();
                    });
                } else {
                    console.error('html2pdf is not defined. Make sure the library is loaded.');
                }
            });
        </script>
            <script type="text/javascript">

                $(document).ready(function () {

                    $(document).on('click', '#send_applicant_message', function () {

                        var postData = $('#send-applicant-message-form').serialize();

                        $.ajax({

                            type: 'POST',

                            url: "{{ route('contact.applicant.message.send') }}",

                            data: postData,

                            //dataType: 'json',

                            success: function (data) {

                                response = JSON.parse(data);

                                var res = response.success;

                                if (res == 'success') {

                                    var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';

                                    $('#alert_messages').html(errorString);

                                    $('#send-applicant-message-form').hide('slow');

                                    $(document).scrollTo('.alert', 2000);

                                } else {

                                    var errorString = '<div class="alert alert-danger" role="alert"><ul>';

                                    response = JSON.parse(data);

                                    $.each(response, function (index, value) {

                                        errorString += '<li>' + value + '</li>';

                                    });

                                    errorString += '</ul></div>';

                                    $('#alert_messages').html(errorString);

                                    $(document).scrollTo('.alert', 2000);

                                }

                            },

                        });

                    });

                    showEducation();

                    showProjects();

                    showExperience();

                    showSkills();

                    showLanguages();

                });

                function showProjects() {

                    $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {
                        user_id: {{$user->id}},
                        _method: 'POST',
                        _token: '{{ csrf_token() }}'
                    })

                        .done(function (response) {

                            $('#projects_div').html(response);

                        });

                }

                function showExperience() {

                    $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {
                        user_id: {{$user->id}},
                        _method: 'POST',
                        _token: '{{ csrf_token() }}'
                    })

                        .done(function (response) {

                            $('#experience_div').html(response);

                        });

                }


                function showEducation() {

                    $.post("{{ route('show.applicant.profile.education', $user->id) }}", {
                        user_id: {{$user->id}},
                        _method: 'POST',
                        _token: '{{ csrf_token() }}'
                    })

                        .done(function (response) {

                            $('#education_div').html(response);

                        });

                }

                function showLanguages() {

                    $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {
                        user_id: {{$user->id}},
                        _method: 'POST',
                        _token: '{{ csrf_token() }}'
                    })

                        .done(function (response) {

                            $('#language_div').html(response);

                        });

                }

                function showSkills() {

                    $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {
                        user_id: {{$user->id}},
                        _method: 'POST',
                        _token: '{{ csrf_token() }}'
                    })

                        .done(function (response) {

                            $('#skill_div').html(response);

                        });

                }


                function send_message() {

                    const el = document.createElement('div')

                    el.innerHTML = "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Employer and try again."

                    @if(null!==(Auth::guard('company')->user()))

                    $('#sendmessage').modal('show');

                    @else

                    swal({

                        title: "You are not Loged in",

                        content: el,

                        icon: "error",

                        button: "OK",

                    });

                    @endif

                }

                if ($("#send-form").length > 0) {

                    $("#send-form").validate({

                        validateHiddenInputs: true,

                        ignore: "",


                        rules: {

                            message: {

                                required: true,

                                maxlength: 5000

                            },

                        },

                        messages: {


                            message: {

                                required: "Message is required",

                            }


                        },

                        submitHandler: function (form) {

                            $.ajaxSetup({

                                headers: {

                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                                }

                            });

                            @if(null !== (Auth::guard('company')->user()))

                            $.ajax({

                                url: "{{route('submit-message-seeker')}}",

                                type: "POST",

                                data: $('#send-form').serialize(),

                                success: function (response) {

                                    $("#send-form").trigger("reset");

                                    $('#sendmessage').modal('hide');

                                    swal({

                                        title: "Success",

                                        text: response["msg"],

                                        icon: "success",

                                        button: "OK",

                                    });

                                }

                            });

                            @endif

                        }

                    })

                }

            </script>
            <script type="text/javascript">
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print('');

                    document.body.innerHTML = originalContents;
                }
            </script>
    @endpush