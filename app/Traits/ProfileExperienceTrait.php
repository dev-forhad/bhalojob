<?php

namespace App\Traits;

use Auth;
use DB;
use Input;
use Carbon\Carbon;
use Redirect;
use App\User;
use App\ProfileExperience;
use App\Country;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ProfileExperienceFormRequest;
use App\Helpers\DataArrayHelper;

trait ProfileExperienceTrait
{

    public function showProfileExperience(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '';
        if (isset($user) && count($user->profileExperience)):
            foreach ($user->profileExperience as $experience):
                if ($experience->is_currently_working == 1)
                    $date_end = 'Currently working';
                else
                    $date_end = $experience->date_end->format('d M, Y');

                $html .= '<!--experience Start-->
            <div class="col-md-12" id="experience_' . $experience->id . '">
              <div class="mt-element-ribbon bg-grey-steel">
                <div class="ribbon ribbon-color-warning uppercase ">' . $experience->title . '</div>
                <p class="ribbon-content">
				' . $experience->company . '<br />               	
                ' . $experience->date_start->format('d M, Y') . ' - ' . $date_end . ' | ' . $experience->getCity('city') . '<br />
                ' . $experience->description . '<br />
                <a href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $experience->id . ',' . $experience->state_id . ',' . $experience->city_id . ');" class="btn btn-warning">' . __('Edit') . '</a>
				<a href="javascript:void(0);" onclick="delete_profile_experience(' . $experience->id . ');" class="btn btn-danger">' . __('Delete') . '</a>
                </p>
              </div>
            </div>
            
            <!--experience End-->';
            endforeach;
        endif;

        echo $html;
    }

    public function showFrontProfileExperience(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $data = '';
        if (isset($user) && count($user->profileExperience)):
            $userExperiences = $user->profileExperience;
            $currentWorkingExperience = null;
            $otherExperiences = [];
            
            foreach ($userExperiences as $experience) {
                if ($experience->is_currently_working == 1) {
                    $currentWorkingExperience = $experience;
                } else {
                    $otherExperiences[] = $experience;
                }
            }
            
           
            $html = '<div class="col-mid-12" style="overflow-x:auto;"><table class="table table-bordered table-condensed">';
            $html  .='  <thead>
              <tr>
                 <th> Company Name </th>
                 <th> Designation </th>
                 <th> Entry </th>
                 <th> Leave/Continue </th>
                 <th> Action </th>
              </tr>
           </thead>';
           
             // Display currently working experience first
           
            
            // Display other experiences
            foreach ($otherExperiences as $experience) {
                $data = $experience->reYear->year_value . ' Month: '. $experience->reMonth->eng_title;
                $html .= '<tr id="experience_' . $experience->id . '">
                            <td><span class="text text-success">' . $experience->company . '</span></td>
                            <td><span class="text text-success">' . $experience->title . '</span></td>
                            <td><span class="text text-success">Year: ' . $experience->entryYear->year_value .' Month: ' .$experience->entryMonth->eng_title. '</span></td>
                            <td><span class="text text-success">' . $data . '</span></td>
                            <td><a href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $experience->id. ');" class="text text-default">' . __('Edit') . '</a>&nbsp;|&nbsp;<a href="javascript:void(0);" onclick="delete_profile_experience(' . $experience->id . ');" class="text text-danger">' . __('Delete') . '</a></td>
                          </tr>';
            }
             if ($currentWorkingExperience) {
                $data = 'Currently Working';
                $html .= '<tr id="experience_' . $currentWorkingExperience->id . '">
                            <td><span class="text text-success">' . $currentWorkingExperience->company . '</span></td>
                            <td><span class="text text-success">' . $currentWorkingExperience->title . '</span></td>
                            <td><span class="text text-success">Year: ' . $currentWorkingExperience->entryYear->year_value .' Month: ' .$currentWorkingExperience->entryMonth->eng_title. '</span></td>
                            <td><span class="text text-success">' . $data . '</span></td>
                            <td><a href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $currentWorkingExperience->id. ');" class="text text-default">' . __('Edit') . '</a>&nbsp;|&nbsp;<a href="javascript:void(0);" onclick="delete_profile_experience(' . $currentWorkingExperience->id . ');" class="text text-danger">' . __('Delete') . '</a></td>
                          </tr>';
            }
        endif;

        echo $html . '</div>';
    }
    public function showFrontProfileExperienceold(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (isset($user) && count($user->profileExperience)):
            $html = '<div class="panel-group">';
            foreach ($user->profileExperience as $experience):
                if ($experience->is_currently_working == 1)
                    $date_end = 'Currently working';
                else
                   // $date_end = $experience->date_end->format('d M, Y');

                $html .= '<div class="panel panel-info" id="experience_' . $experience->id . '">
						  <div class="panel-heading"><h4>' . $experience->title . '</h4></div>
						  <div class="panel-body">
						  <p class="text-left"><h5>' . $experience->company . '</h5></p>
						  <p class="text-left"> Entry: ' . $experience->entryYear->year_value .' Month: ' .$experience->entryMonth->eng_title. '</p>
						  <p class="text-left"> Resign: ' . $experience->reYear->year_value . ' Month: '. $experience->reMonth->eng_title . '</p>
						  </div>
						<div class="panel-footer"><a href="javascript:void(0);" onclick="showProfileExperienceEditModal(' . $experience->id . ',' . $experience->state_id . ',' . $experience->city_id . ');" class="text text-default">' . __('Edit') . '</a>&nbsp;|&nbsp;<a href="javascript:void(0);" onclick="delete_profile_experience(' . $experience->id . ');" class="text text-danger">' . __('Delete') . '</a></div>
						</div>';
            endforeach;
        endif;

        echo $html . '</div>';
    }

    public function showApplicantProfileExperience(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<ul class="experienceList">';
        if (isset($user) && count($user->profileExperience)):
            foreach ($user->profileExperience as $experience):
                if ($experience->is_currently_working == 1)
                    $date_end = 'Currently working';
                else
                    $date_end = $experience->date_end->format('d M, Y');

                $html .= '<li>
                <div class="row">
                  <div class="col-md-2"><img src="' . asset('images/work-experience.png') . '" alt="work experience"></div>
                  <div class="col-md-10">
                    <h4>' . $experience->company . ' | ' . $experience->getCity('city') . '</h4>
                    <div class="row">
                      <div class="col-md-6">' . $experience->title . '</div>
                      <div class="col-md-6">From ' . $experience->date_start->format('d M, Y') . ' - ' . $date_end . '</div>
                    </div>
                    <p>' . $experience->description . '</p>
                  </div>
                </div>
              </li>';
            endforeach;
        endif;

        echo $html . '</ul>';
    }

    public function getProfileExperienceForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::defaultCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('admin.user.forms.experience.experience_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileExperienceForm(Request $request, $user_id)
    {
        $countries = DataArrayHelper::langCountriesArray();

        $user = User::find($user_id);
        $returnHTML = view('user.forms.experience.experience_modal')
                ->with('user', $user)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function storeProfileExperience(ProfileExperienceFormRequest $request, $user_id)
    {
       // return response()->json(array('success' => true, 'status' => 200, 'html' => $request->all()), 200);
        $profileExperience = new ProfileExperience();
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->save();

        $returnHTML = view('admin.user.forms.experience.experience_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function storeFrontProfileExperience(ProfileExperienceFormRequest $request, $user_id)
    {
        $enty_year = $request->entrance_year;
        $resign_year = $request->pass_year;
        $enty_month = $request->entrance_month;
        $resign_month = $request->pass_month;
        
        
        if($request->is_currently_working == 1){
             $experiences = ProfileExperience::where('user_id', $user_id)->get();
            $currentlyWorkingExperience = $experiences->firstWhere('is_currently_working', 1);
            if ($currentlyWorkingExperience) {
                return response()->json(['is_currently_working' => 'You are already have one currently working info.Please modify again', 'status' => 422]);

            }else{
                $profileExperience = new ProfileExperience();
                $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
                $profileExperience->save();
        
                $returnHTML = view('user.forms.experience.experience_thanks')->render();
                return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
                }
        }else{
           if($resign_year < $enty_year){
                return response()->json(['error' => 'Resign Year is not Correct', 'status' =>201]);
            }elseif($resign_year == $enty_year){
                if($resign_month <= $enty_month){
                    return response()->json(['error' => 'Resign Month is not Correct', 'status' =>202]);
                }
            }
           
            
        } 
       
    
        
            $profileExperience = new ProfileExperience();
            $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
            $profileExperience->save();
    
            $returnHTML = view('user.forms.experience.experience_thanks')->render();
            return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
        


        //return response()->json(['user_info' => $request->all()]);

        
    }

    private function assignExperienceValues($profileExperience, $request, $user_id)
    {
        $profileExperience->user_id = $user_id;
        $profileExperience->title = $request->input('title');
        $profileExperience->slug = $this->createSlug($request->input('title'));
        $profileExperience->company = $request->input('company');
        // $profileExperience->country_id = $request->input('country_id');
        // $profileExperience->state_id = $request->input('state_id');
        // $profileExperience->city_id = $request->input('city_id');
        $profileExperience->entrance_year = $request->input('entrance_year');
        $profileExperience->entrance_month = $request->input('entrance_month');
        $profileExperience->pass_year = $request->input('pass_year');
        $profileExperience->pass_month = $request->input('pass_month');
        // $profileExperience->date_start = $request->input('date_start');
        // $profileExperience->date_end = $request->input('date_end');
        $profileExperience->is_currently_working = $request->input('is_currently_working');
        $profileExperience->description = $request->input('description');
        return $profileExperience;
    }

    public function getProfileExperienceEditForm(Request $request, $user_id)
    {
        $profile_experience_id = $request->input('profile_experience_id');

        $countries = DataArrayHelper::defaultCountriesArray();

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $user = User::find($user_id);

        $returnHTML = view('admin.user.forms.experience.experience_edit_modal')
                ->with('user', $user)
                ->with('profileExperience', $profileExperience)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileExperienceEditForm(Request $request, $user_id)
    {
        $profile_experience_id = $request->input('profile_experience_id');
        $countries = DataArrayHelper::langCountriesArray();

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $user = User::find($user_id);

        $returnHTML = view('user.forms.experience.experience_edit_modal')
                ->with('user', $user)
                ->with('profileExperience', $profileExperience)
                ->with('countries', $countries)
                ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function updateProfileExperience(ProfileExperienceFormRequest $request, $profile_experience_id, $user_id)
    {

        $profileExperience = ProfileExperience::find($profile_experience_id);
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->update();

        $returnHTML = view('admin.user.forms.experience.experience_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function updateFrontProfileExperience(ProfileExperienceFormRequest $request, $profile_experience_id, $user_id)
    {
        $enty_year = $request->entrance_year;
        $resign_year = $request->pass_year;
        if($resign_year < $enty_year){
            return response()->json(['error' => 'Resign Year is not Correct', 'status' =>201]);
        }
        $profileExperience = ProfileExperience::find($profile_experience_id);
        $profileExperience = $this->assignExperienceValues($profileExperience, $request, $user_id);
        $profileExperience->update();

        $returnHTML = view('user.forms.experience.experience_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function deleteProfileExperience(Request $request)
    {
        $id = $request->input('id');
        try {
            $profileExperience = ProfileExperience::findOrFail($id);
            $profileExperience->delete();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

   public function createSlug($string) {

          $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $string), '-'));
           $uniqueSlug = $slug . '-' . substr(uniqid(),  -3);
            return str_replace('-','_',$uniqueSlug);
    }

}
