<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Input;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use ImgUploader;
use Carbon\Carbon;
use Redirect;
use Newsletter;
use App\User;
use App\Subscription;
use App\ApplicantMessage;
use App\Company;
use App\FavouriteCompany;
use App\Gender;
use App\MaritalStatus;
use App\Country;
use App\State;
use App\City;
use App\JobExperience;
use App\JobApply;
use App\CareerLevel;
use App\Industry;
use App\Alert;
use App\FunctionalArea;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Traits\CommonUserFunctions;
use App\Traits\ProfileSummaryTrait;
use App\Traits\ProfileCvsTrait;
use App\Traits\ProfileProjectsTrait;
use App\Traits\ProfileExperienceTrait;
use App\Traits\ProfileEducationTrait;
use App\Traits\ProfileSkillTrait;
use App\Traits\ProfileLanguageTrait;
use App\Models\LanguageConvert;
use App\Traits\Skills;
use App\ProfileProject;
use App\Http\Requests\Front\UserFrontFormRequest;
use App\Helpers\DataArrayHelper;

class UserController extends Controller
{

    use CommonUserFunctions;
    use ProfileSummaryTrait;
    use ProfileCvsTrait;
    use ProfileProjectsTrait;
    use ProfileExperienceTrait;
    use ProfileEducationTrait;
    use ProfileSkillTrait;
    use ProfileLanguageTrait;
    use Skills;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['myProfile', 'updateMyProfile', 'viewPublicProfile']]);
        $this->middleware('auth', ['except' => ['showApplicantProfileEducation', 'showApplicantProfileProjects', 'showApplicantProfileExperience', 'showApplicantProfileSkills', 'showApplicantProfileLanguages']]);
    }

    // public function viewPublicProfile($id)
    // {

    //     $user = User::with('gender')->find($id);

    //     $profileCv = $user->getDefaultCv();
        
    //     return view('user.applicant_profile')
    //         ->with('user', $user)
    //         ->with('profileCv', $profileCv)
    //         ->with('page_title', $user->getName())
    //         ->with('form_title', 'Contact ' . $user->getName());
    // }


    public function viewPublicProfile($id)
    {   
        
        $user= User::find($id);  
        $gender=Gender::where('id', $user->gender_id)->first();
        $MaritalStatus=MaritalStatus::where('id', $user->marital_status_id)->first();
        $JobExperience=JobExperience::where('id', $user->job_experience_id)->first();
        $CareerLevel=CareerLevel::where('id', $user->career_level_id)->first();
        $project=ProfileProject::Where('user_id', Auth::user()->id)->first();
        return view('user.applicant_profile')
        ->with('user', $user)
        ->with('gender',$gender)
        ->with('MaritalStatus',$MaritalStatus)
        ->with('JobExperience',$JobExperience)
        ->with('CareerLevel',$CareerLevel)
        ->with('project',$project)
        ->with('page_title', $user->getName());
    }

    public function myProfile()
    {
        // echo 'hii'; exit();
        $genders = DataArrayHelper::langGendersArray();
        $maritalStatuses = DataArrayHelper::langMaritalStatusesArray();
        $nationalities = DataArrayHelper::langNationalitiesArray();
        $countries = DataArrayHelper::langCountriesArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
        $careerLevels = DataArrayHelper::langCareerLevelsArray();
        $industries = DataArrayHelper::langIndustriesArray();
        $functionalAreas = DataArrayHelper::langFunctionalAreasArray();
        $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
        $user = User::findOrFail(Auth::user()->id);

        return view('user.edit_profile')
            ->with('genders', $genders)
            ->with('maritalStatuses', $maritalStatuses)
            ->with('nationalities', $nationalities)
            ->with('countries', $countries)
            ->with('jobExperiences', $jobExperiences)
            ->with('careerLevels', $careerLevels)
            ->with('industries', $industries)
            ->with('functionalAreas', $functionalAreas)
            ->with('user', $user)
            ->with('upload_max_filesize', $upload_max_filesize);
    }

    //  function showApplicantProfileEducation()
     
    //  {
  
    //       Echo "dsdsads";

    //  }

    public function userProfileUpdate(Request $request)
    {
        //  dd($request->all());
        $user = User::findOrFail(Auth::user()->id);
        
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birth_year = $request->input('birth_year');
        $user->birth_month = $request->input('birth_month');
        $user->birth_day = $request->input('birth_day');
        $user->gender_id = $request->input('gender_id');
        $user->email = $request->input('email');
        $user->marital_status_id = $request->input('marital_status_id');
        $user->country_id = $request->input('country_id_bd');
        $user->state_id = $request->input('state_id_bd');
        $user->city_id = $request->input('city_id_bd');
        $user->phone = $request->input('bd_cell_phone');
        $user->jp_cell_phone = $request->input('jp_cell_phone');
        $user->emergency_contact_jp = $request->input('emergency_contact_jp');
        $user->current_visa_status_id = $request->input('current_visa_status_id');
        $user->emergency_cell_phone = $request->input('emergency_cell_phone');
        $user->jp_visa_expiry_year = $request->input('jp_visa_expiry_year');
        $user->jp_visa_expiry_month = $request->input('jp_visa_expiry_month');
        $user->jp_visa_expiry_day = $request->input('jp_visa_expiry_day');
        $user->country_id_bd = $request->input('country_id_bd');
        $user->state_id_bd = $request->input('state_id_bd');
        $user->city_id_bd = $request->input('city_id_bd');
        $user->bd_postal_code = $request->input('bd_postal_code');
        $user->bd_address = $request->input('bd_address');
        $user->bd_cell_phone = $request->input('bd_cell_phone');
        $user->bd_children = $request->input('bd_children');
        $user->street_address = $request->input('street_address');
        $user->prefecture = $request->input('prefecture');
        $user->jp_city = $request->input('jp_city');
        $user->update();
         
        return response()->json(['personal_info' => $user]);

    }
    
    public function updateprofileimage(Request $request){
       
        $user = User::findOrFail(Auth::user()->id);
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            $is_deleted = $this->deleteUserImage($user->id);
            $image = $request->file('image');
            $fileName = ImgUploader::UploadImage('user_images', $image, $request->input('name'), 300, 300, false);
            $user->image = $fileName;
        }

        if ($request->hasFile('cover_image')) {
            $is_deleted = $this->deleteUserCoverImage($user->id);
            $cover_image = $request->file('cover_image');
            $fileName_cover_image = ImgUploader::UploadImage('user_images', $cover_image, $request->input('name'), 1140, 250, false);
            $user->cover_image = $fileName_cover_image;
        }
        $user->update();
        return response()->json(['personal_info' => $user]);
    }

    public function updateMyProfile(UserFrontFormRequest $request)
    {

        // dd($request->all());

        $user = User::findOrFail(Auth::user()->id);
        /*         * **************************************** */
        if ($request->hasFile('image')) {
            $is_deleted = $this->deleteUserImage($user->id);
            $image = $request->file('image');
            $fileName = ImgUploader::UploadImage('user_images', $image, $request->input('name'), 300, 300, false);
            $user->image = $fileName;
        }

        if ($request->hasFile('cover_image')) {
            $is_deleted = $this->deleteUserCoverImage($user->id);
            $cover_image = $request->file('cover_image');
            $fileName_cover_image = ImgUploader::UploadImage('user_images', $cover_image, $request->input('name'), 1140, 250, false);
            $user->cover_image = $fileName_cover_image;
        }


        /*         * ************************************** */
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        /*         * *********************** */
        $user->name = $user->getName();
        /*         * *********************** */
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->father_name = $request->input('father_name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->gender_id = $request->input('gender_id');
        $user->marital_status_id = $request->input('marital_status_id');
        $user->nationality_id = $request->input('nationality_id');
        $user->national_id_card_number = $request->input('national_id_card_number');
        $user->country_id = $request->input('country_id');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->phone = $request->input('phone');
        $user->mobile_num = $request->input('mobile_num');
        $user->job_experience_id = $request->input('job_experience_id');
        $user->career_level_id = $request->input('career_level_id');
        $user->industry_id = $request->input('industry_id');
        $user->functional_area_id = $request->input('functional_area_id');
        $user->current_salary = $request->input('current_salary');
        $user->expected_salary = $request->input('expected_salary');
        $user->salary_currency = $request->input('salary_currency');
        $user->video_link = $request->video_link;
        $user->street_address = $request->input('street_address');
        $user->is_subscribed = $request->input('is_subscribed', 0);
        $user->prefecture = $request->input('prefecture');
        $user->jp_city = $request->input('jp_city');
        $user->update();
        $this->updateUserFullTextSearch($user);
        /*************************/
        Subscription::where('email', 'like', $user->email)->delete();
        if ((bool)$user->is_subscribed) {
            $subscription = new Subscription();
            $subscription->email = $user->email;
            $subscription->name = $user->name;
            $subscription->save();

            /*************************/
            Newsletter::subscribeOrUpdate($subscription->email, ['FNAME' => $subscription->name]);
            /*************************/
        } else {
            /*************************/
            Newsletter::unsubscribe($user->email);
            /*************************/
        }

        flash(__('You have updated your profile successfully'))->success();
        return \Redirect::route('my.profile');
    }

    public function addToFavouriteCompany(Request $request, $company_slug)
    {
        $data['company_slug'] = $company_slug;
        $data['user_id'] = Auth::user()->id;
        $data_save = FavouriteCompany::create($data);
        flash(__('You are following this company now'))->success();
        return \Redirect::route('company.detail', $company_slug);
    }

    public function removeFromFavouriteCompany(Request $request, $company_slug)
    {
        $user_id = Auth::user()->id;
        FavouriteCompany::where('company_slug', 'like', $company_slug)->where('user_id', $user_id)->delete();
        flash(__('You have unfollowed this company'))->success();
        return \Redirect::route('company.detail', $company_slug);
    }

    public function myFollowings()
    {
        $user = User::findOrFail(Auth::user()->id);
        $companiesSlugArray = $user->getFollowingCompaniesSlugArray();
        $companies = Company::whereIn('slug', $companiesSlugArray)->get();
        // dd($companies );  
        return view('user.following_companies')
            ->with('user', $user)
            ->with('companies', $companies);
    }

    public function myMessages()
    {
        $user = User::findOrFail(Auth::user()->id);
        $messages = ApplicantMessage::where('user_id', '=', $user->id)
            ->orderBy('is_read', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.applicant_messages')
            ->with('user', $user)
            ->with('messages', $messages);
    }

    public function applicantMessageDetail($message_id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $message = ApplicantMessage::findOrFail($message_id);
        $message->update(['is_read' => 1]);

        return view('user.applicant_message_detail')
            ->with('user', $user)
            ->with('message', $message);
    }


    public function myAlerts()
    {
        $alerts = Alert::where('email', Auth::user()->email)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($alerts);
        return view('user.applicant_alerts')
            ->with('alerts', $alerts);
    }


    
    public function delete_alert($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->delete();
        $arr = array('msg' => 'A Alert has been successfully deleted. ', 'status' => true);
        return Response()->json($arr);
    }


    public function ResumeFetch($id)
    {
          
        $user = User::findOrFail($id);
        $languageConvert = LanguageConvert::where('user_id',$id)->get()->first();
        $profileCv = $user->getDefaultCv();    
        
        return view('user.resume')
            ->with('japaneseCv', $languageConvert)
            ->with('user', $user)
            ->with('profileCv', $profileCv)
            ->with('page_title', $user->getName())
            ->with('form_title', 'Contact ' . $user->getName());
    }
     public function resume($id){
        $user = User::findOrFail($id);
        $languageConvert = LanguageConvert::where('user_id',$id)->get()->first();
        $profileCv = $user->getDefaultCv();
        
        return view('user.userresume')
            ->with('japaneseCv', $languageConvert)
            ->with('user', $user)
            ->with('profileCv', $profileCv)
            ->with('page_title', $user->getName())
            ->with('form_title', 'Contact ' . $user->getName());
    }

}
