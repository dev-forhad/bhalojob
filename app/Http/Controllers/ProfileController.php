<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Helpers\MiscHelper;
use App\User;
use App\Company;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Helpers\DataArrayHelper;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use ImgUploader;
use Auth;
use DB;
use App\ProfileSummary;
use App\ProfileLanguage;
use App\Language;
use App\ProfileEducation;
use App\Http\Requests\ProfileEduFormRequest;
class ProfileController extends Controller
{
        use AuthenticatesUsers;
   public function __construct()
    {
        $this->middleware('auth');
    }
   
   public function getProfileimage(){
    //   $userid = session()->get('user_id');
    $user = User::findOrFail(Auth::user()->id);
    //   dd($userid);
       return view('candidate.image', compact('user'));
   } 
   public function profile_info(){
        $user = User::findOrFail(Auth::user()->id);
     
        //   if(!$userid){
           
        //       return redirect()->route('register');
        //   }
        $nationalities = DataArrayHelper::langNationalitiesArray();
        $countries = DataArrayHelper::langCountriesArray();
        $upload_max_filesize = UploadedFile::getMaxFilesize() / (1048576);
       return view('candidate.profile')->with('nationalities', $nationalities)
            ->with('countries', $countries)->with('upload_max_filesize', $upload_max_filesize)->with('user', $user);
   }
   public function personalInfo(Request $request){
    //   dd($request->all());
        $user = User::findOrFail(Auth::user()->id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birth_year = $request->input('birth_year');
        $user->birth_month = $request->input('birth_month');
        $user->birth_day = $request->input('birth_day');
        $user->gender_id = $request->input('gender_id');
        $user->marital_status_id = $request->input('marital_status_id');
        $user->has_children = $request->input('has_children');
        $user->bd_children = $request->input('bd_children');
        $user->update();
        return response()->json(['personal_info' => $user]);
   }
   
   public function addressinfo(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $user->country_id = $request->input('country_id');
        $user->nationality_id = $request->input('nationality_id');
        $user->phone = $request->input('phone');
        $user->bd_postal_code = $request->input('bd_postal_code');
        $user->bd_address = $request->input('bd_address');
        $user->bd_village = $request->input('bd_village');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
        $user->mother_tongue = $request->input('mother_tongue');
        $user->update();
        return response()->json(['address_info' => $user]);
        
   }
   public function storeImage(Request $request){
    //   dd($request->all());
       
       $user = User::findOrFail(Auth::user()->id);
    //   $user = User::findOrFail($userid);
       if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $fileName = ImgUploader::UploadImage('user_images', $image, uniqid(), 300, 300, false);
            $user->image = $fileName;
            $user->save();
            return response()->json(['image_info' => $user]);
        }
   }
   public function storeVisa(Request $request){
    //   $userid = session()->get('user_id');
      $user = User::findOrFail(Auth::user()->id);
       $user->current_visa_status_id = $request->input('current_visa_status_id');
        $user->jp_visa_expiry_year = $request->input('jp_visa_expiry_year');
        $user->jp_visa_expiry_month = $request->input('visa-expiry-month');
        $user->save();
        return response()->json(['visa_info' => $user]);
   }
   public function loadlangform($user_id){
       $languages = DataArrayHelper::languagesArray();
        $languageLevels = DataArrayHelper::defaultLanguageLevelsArray();
        $user = User::find($user_id);
        $returnHTML = view('candidate.language.language_modal')
                ->with('user', $user)
                ->with('languages', $languages)
                ->with('languageLevels', $languageLevels)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    
   }
   public function postsummery(Request $request, $user_id){
        ProfileSummary::where('user_id', '=', $user_id)->delete();
        $summary = $request->input('summary');
        $ProfileSummary = new ProfileSummary();
        $ProfileSummary->user_id = $user_id;
        $ProfileSummary->summary = $summary; 
        $ProfileSummary->save();
        /*         * ************************************ */
        return response()->json(array('success' => true, 'status' => 200), 200);
   }
   public function thankyou(){
       return view('candidate.thankyou');
   }
   public function getcertificatetype(Request $request){
        $type_id = $request->type_id;
        $langs = Language::where('id', $type_id)->first();
        $languageinfos = DB::table('language_types')->where("lang_id",$langs->id)->get();
        return response()->json(array('success' => true, 'languageinfos' => $languageinfos));
            
   }
   public function getlanguagetype(Request $request){
    
            
           // $languageType = $request->language_level_type_id;//1 or 2
            $type_id = $request->type_id;
            $langs = Language::where('id', $type_id)->first();
            
                $languageinfos = DB::table('language_levels')->where("lang",$langs->iso_code)->get();
                return response()->json(array('success' => true, 'languageinfos' => $languageinfos));
            
    
   }
   public function fetchDrivingClass(){
       $listoflisene = DB::table('driving_classes')->get();
       return response()->json(array('success' => true, 'listoflisene' => $listoflisene));

   }
   
   public function storelanguage(Request $request, $id){
       $profileLanguage = new ProfileLanguage();
        $profileLanguage->user_id = $id;
        $profileLanguage->language_id = $request->input('lang_id');
        // $profileLanguage->language_type_id = $request->input('lang_type_id');
        $profileLanguage->language_level_id = $request->input('lang_type_id');
        
        $profileLanguage->save();
        /*         * ************************************ */
        $returnHTML = view('user.forms.language.language_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
   }
   public function geteducationalform($user_id){
        $degreeLevels = DataArrayHelper::langDegreelevelsArray();
        $user = User::find($user_id);
        $returnHTML = view('user.forms.education.educational_modal')
            ->with('user', $user)
            ->with('degreeLevels', $degreeLevels)
            
            ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
   }
   public function storeprofileeducationinfo(Request $request, $user_id){
        $request->validate([
            "entrance_year" => "required",
            "entrance_month" => "required",
            "pass_year" => "required",
            "pass_month" => "required",
            "institution_name" => "required",
            "degree_level_id" => "required",
            "major" => "nullable",
        ]);
        $profileEducation = new ProfileEducation();
        $profileEducation->user_id = $user_id;
        $profileEducation->degree_level_id = $request->input('degree_level_id');
        $profileEducation->entrance_year = $request->input('entrance_year');
        $profileEducation->entrance_month = $request->input('entrance_month');
        $profileEducation->pass_year = $request->input('pass_year');
        $profileEducation->pass_month = $request->input('pass_month');
        $profileEducation->institution_name = $request->input('institution_name');
        $profileEducation->major = $request->input('major');
        $profileEducation->save();
        
       
        
        $returnHTML = view('admin.user.forms.education.education_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
   }
}
