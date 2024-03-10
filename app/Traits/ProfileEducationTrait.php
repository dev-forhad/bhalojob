<?php

namespace App\Traits;

use Auth;
use DB;
use Input;
use Carbon\Carbon;
use Redirect;
use App\User;
use App\ProfileEducation;
use App\ProfileEducationMajorSubject;
use App\DegreeLevel;
use App\DegreeType;
use App\ResultType;
use App\MajorSubject;
use App\Country;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\ProfileEducationFormRequest;
use App\Helpers\DataArrayHelper;

trait ProfileEducationTrait
{

    public function showProfileEducation(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '';
        if (isset($user) && count($user->profileEducation)):
            foreach ($user->profileEducation as $education):

                $html .= '<!--education Start-->
            <div class="col-md-12" id="education_' . $education->id . '">
              <div class="mt-element-ribbon bg-grey-steel">
                <div class="ribbon ribbon-color-warning uppercase ">' . $education->getDegreeLevel('degree_level') . ' - ' . $education->getDegreeType('degree_type') . '</div>
                <p class="ribbon-content">
				' . $education->degree_title . '<br />               	
                ' . $education->date_completion . ' | ' . $education->getCity('city') . '<br />
                ' . $education->institution . '<br />
                <a href="javascript:void(0);" onclick="showProfileEducationEditModal(' . $education->id . ',' . $education->state_id . ',' . $education->city_id . ',' . $education->degree_type_id . ');" class="btn btn-warning">' . __('Edit') . '</a>
				<a href="javascript:void(0);" onclick="delete_profile_education(' . $education->id . ');" class="btn btn-danger">' . __('Delete') . '</a>
                </p>
              </div>
            </div>
            <!--education End-->';
            endforeach;
        endif;

        echo $html;
    }

    public function showFrontProfileEducations(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $profileEducation = $user->profileEducation()->whereNull('education_type')->orderby('pass_year', 'asc')->get();
        $html = '<div class="panel-group">';
        if (isset($user) && count($profileEducation)):
            foreach ($profileEducation as $education):


                $html .= '<div class="panel panel-info" id="education_' . $education->id . '">
						  <div class="form-title"><h4  class="heading">' . $education->getDegreeLevel('degree_level') . ' </h4></div>
						  <div class="panel-body">
						  <p class="text-left"><h5>Pass YEAR: ' . $education->date_completion  . '</h5></p>
						  
						  <p class="text-left">' . $education->institution . ' | ' . $education->getCity('city') . '</p>
						  <p class="text-left">' . $education->major . '</p>
						  </div>
						<div class="panel-footer"><a href="javascript:void(0);" onclick="showProfileEducationEditModal(' . $education->id . ',' . $education->degree_type_id . ');" class="text text-default btn btn-large btn-primary">' . __('Edit') . ' <i   class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>&nbsp;|&nbsp;<a href="javascript:void(0);" onclick="delete_profile_education(' . $education->id . ');" class="text text-white btn btn-danger">' . __('Delete') . '</a></div>
						</div>';
            endforeach;
        endif;

        echo $html . '</div>';
    }
    
    public function showFrontProfileEducation(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $profileEducation = $user->profileEducation()->whereNull('education_type')->get();
        $html = '<div class="col-mid-12" style="overflow-x:auto;"><table class="table table-bordered table-condensed">';
        if (isset($user) && count($profileEducation)):
            $html  .='  <thead>
              <tr>
                
                 <th> Degree </th>
                 <th> Institution</th>
                 <th> Entry Year </th>
                 <th>Entry Month</th>
                 <th> Pass Year </th>
                 <th> Pass Month </th>
                 <th> Major </th>
                 
                 <th> Action </th>
              </tr>
           </thead><tbody>';
            foreach ($profileEducation as $education):

                $html .= '<tr id="education_' . $education->id . '">
					
						
						
						<td><span class="text text-success">' . $education->getDegreeLevel('degree_level') . '</span></td>
						<td><span class="text text-success">' . $education->institution_name . '</span></td>
						<td><span class="text text-success">'.$education->entrance->year_value .'</span></td>
						<td><span class="text text-success">'.$education->entranc_month->eng_title .'</span></td>
						<td><span class="text text-success">' .$education->pass->year_value. '</span></td>
						<td><span class="text text-success">'.$education->pass_months->eng_title .'</span></td>
						<td><span class="text text-success">'. $education->major . '</span></td>
						<td>&nbsp;<a href="javascript:void(0);" onclick="showProfileEducationEditModal(' . $education->id . ',' . $education->degree_type_id . ');" class="text text-default">' . __('Edit') . '</a>&nbsp;|&nbsp;<a href="javascript:void(0);" onclick="delete_profile_education(' . $education->id . ');" class="text text-danger">' . __('Delete') . '</a></td>
								</tr>';
								
                
            endforeach;
        endif;

        echo $html . '</tbody></table></div>';
    }

    public function showApplicantProfileEducation(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $html = '<ul class="educationList">';
        if (isset($user) && count($user->profileEducation)):
            foreach ($user->profileEducation as $education):
                
        //         if($education->education_type == 1){
        //             $html .= '<li>                
        //             <h4>SECONDARY (SSC)/MIDDLE SCHOOL/O-LEVEL</h4>
    				// <div class="date">'.$education->entranc_month->eng_title .','. $education->entrance->year_value .'-' .$education->pass_months->eng_title .','. $education->pass->year_value . '</div>
    			 //   <p>' . $education->institution_name . '</p>
        //             <div class="clearfix"></div>
        //           </li>';
        //         }
        //         if($education->education_type == 2){
        //             $html .= '<li>                
        //             <h4>HIGH SCHOOL/COLLEGE/DEPLOMA</h4>
    				// <div class="date">'.$education->entranc_month->eng_title .','. $education->entrance->year_value .'-' .$education->pass_months->eng_title .','. $education->pass->year_value . '</div>
    			 //   <p>' . $education->institution_name . '</p>
        //             <div class="clearfix"></div>
        //           </li>';
        //         }
        //         if($education->education_type == 3){
        //             $html .= '<li>                
        //             <h4>UNIVERSITY</h4>
    				// <div class="date">'.$education->entranc_month->eng_title .','. $education->entrance->year_value .'-' .$education->pass_months->eng_title .','. $education->pass->year_value . '</div>
    			 //   <p>' . $education->institution_name . '</p>
        //             <div class="clearfix"></div>
        //           </li>';
        //         }
                 if($education->degree_level_id){

                $majorSubjects = $education->major;
                $html .= '<li>                
                <h4>' . $education->getDegreeLevel('degree_level') . ' - ' . $education->getDegreeType('degree_type') . '</h4>
				<div class="date">' . $education->date_completion . ' - ' . $education->getCity('city') . '</div>
				<h5>' . $education->degree_title . '</h5>
				<p>' . $majorSubjects . '<br/>' . $education->institution_name . '</p>
                <div class="clearfix"></div>
              </li>';
                 }
            endforeach;
        endif;

        echo $html . '</ul>';
    }

    public function getProfileEducationForm(Request $request, $user_id)
    {

        $degreeLevels = DataArrayHelper::defaultDegreelevelsArray();
        $resultTypes = DataArrayHelper::defaultResultTypesArray();
        $majorSubjects = DataArrayHelper::defaultMajorSubjectsArray();
        $countries = DataArrayHelper::defaultCountriesArray();

        $profileEducationMajorSubjectIds = array();

        $user = User::find($user_id);
        $returnHTML = view('admin.user.forms.education.education_modal')
            ->with('user', $user)
            ->with('degreeLevels', $degreeLevels)
            ->with('resultTypes', $resultTypes)
            ->with('majorSubjects', $majorSubjects)
            ->with('profileEducationMajorSubjectIds', $profileEducationMajorSubjectIds)
            ->with('countries', $countries)
            ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileEducationForm(Request $request, $user_id)
    {

        $degreeLevels = DataArrayHelper::langDegreelevelsArray();
        $resultTypes = DataArrayHelper::langResultTypesArray();
        $majorSubjects = DataArrayHelper::langMajorSubjectsArray();
        $countries = DataArrayHelper::langCountriesArray();
        $profileEducationMajorSubjectIds = array();

        $user = User::find($user_id);
        $returnHTML = view('user.forms.education.education_modal')
            ->with('user', $user)
            ->with('degreeLevels', $degreeLevels)
            ->with('resultTypes', $resultTypes)
            ->with('majorSubjects', $majorSubjects)
            ->with('profileEducationMajorSubjectIds', $profileEducationMajorSubjectIds)
            ->with('countries', $countries)
            ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }


    public function storeProfileEducation(ProfileEducationFormRequest $request, $user_id)
    {





        $profileEducation = new ProfileEducation();
        $profileEducation = $this->assignEducationValues($profileEducation, $request, $user_id);
        $profileEducation->save();
        /*         * ************************************ */
        $this->storeprofileEducationMajorSubjects($request, $profileEducation->id);
        /*         * ************************************ */
        $returnHTML = view('admin.user.forms.education.education_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function submitDefaultProfileEducationForm(Request $request, $user_id)
    {
        $educationType = $request->education_type;
        $checkExisting= ProfileEducation::where('education_type', $educationType)->where("user_id",$user_id)->get()->first();
        if (!empty($checkExisting)) {
            $profileEducation = $checkExisting;
        } else {
            $profileEducation = new ProfileEducation();
        }

        $profileEducation->user_id = $user_id;
        $profileEducation->education_type = $request->input('education_type');
        $profileEducation->entrance_year = $request->input('entrance_year');
        $profileEducation->entrance_month = $request->input('entrance_month');
        $profileEducation->pass_year = $request->input('pass_year');
        $profileEducation->pass_month = $request->input('pass_month');
        $profileEducation->institution_name = $request->input('institution_name');
        if ($profileEducation->save()) {
            $returnHTML = view('user.forms.education.education_thanks')->render();
            return response()->json(array('success' => true, 'status' => 200, 'html' => $request->all()), 200);
        } else {
            return response()->json(array('success' => true, 'status' => 200, 'html' => 2), 200);
        }
        // return response()->json(array('success' => true, 'status' => 200, 'html' => $request->all()), 200);

    }

    public function storeFrontProfileEducation(ProfileEducationFormRequest $request, $user_id)
    {
        //return response()->json(array('education_info' => $request->all()), 200);
        $profileEducation = new ProfileEducation();
        $profileEducation = $this->assignEducationValues($profileEducation, $request, $user_id);
        $profileEducation->save();
        /*         * ************************************ */
        $this->storeprofileEducationMajorSubjects($request, $profileEducation->id);
        /*         * ************************************ */
        $returnHTML = view('user.forms.education.education_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    private function assignEducationValues($profileEducation, $request, $user_id)
    {
        $profileEducation->user_id = $user_id;
        $profileEducation->degree_level_id = $request->input('degree_level_id');
        $profileEducation->degree_type_id = $request->input('degree_type_id');
        $profileEducation->degree_title = $request->input('degree_title');
         $profileEducation->country_id = $request->input('country_id');
        $profileEducation->state_id = $request->input('state_id');
        $profileEducation->city_id = $request->input('city_id');
         $profileEducation->date_completion = $request->input('date_completion');
         $profileEducation->institution = $request->input('institution');
        $profileEducation->degree_result = $request->input('degree_result');
        $profileEducation->result_type_id = $request->input('result_type_id');
        $profileEducation->entrance_year = $request->input('entrance_year');
        $profileEducation->entrance_month = $request->input('entrance_month');
        $profileEducation->pass_year = $request->input('pass_year');
        $profileEducation->pass_month = $request->input('pass_month');
        $profileEducation->institution_name = $request->input('institution_name');
        $profileEducation->major = $request->input('major');
        return $profileEducation;
    }

    public function getProfileEducationEditForm(Request $request, $user_id)
    {
        $education_id = $request->input('education_id');

        $degreeLevels = DataArrayHelper::defaultDegreelevelsArray();
        $resultTypes = DataArrayHelper::defaultResultTypesArray();
        $majorSubjects = DataArrayHelper::defaultMajorSubjectsArray();
        $countries = DataArrayHelper::defaultCountriesArray();

        $profileEducation = ProfileEducation::find($education_id);
        $profileEducationMajorSubjectIds = $profileEducation->getProfileEducationMajorSubjectsArray();
        $user = User::find($user_id);

        $returnHTML = view('admin.user.forms.education.education_edit_modal')
            ->with('user', $user)
            ->with('profileEducation', $profileEducation)
            ->with('degreeLevels', $degreeLevels)
            ->with('resultTypes', $resultTypes)
            ->with('majorSubjects', $majorSubjects)
            ->with('profileEducationMajorSubjectIds', $profileEducationMajorSubjectIds)
            ->with('countries', $countries)
            ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function getFrontProfileEducationEditForm(Request $request, $user_id)
    {
        $education_id = $request->input('education_id');

        $degreeLevels = DataArrayHelper::langDegreelevelsArray();
        $resultTypes = DataArrayHelper::langResultTypesArray();
        $majorSubjects = DataArrayHelper::langMajorSubjectsArray();
        $countries = DataArrayHelper::langCountriesArray();

        $profileEducation = ProfileEducation::find($education_id);
        
        // $profileEducationMajorSubjectIds = $profileEducation->getProfileEducationMajorSubjectsArray();
        if ($profileEducation !== null) {
            $profileEducationMajorSubjectIds = $profileEducation->getProfileEducationMajorSubjectsArray();
        } else {
            // Handle the case when $profileEducation is null
            // You can set a default value or perform some other actions.
            $profileEducationMajorSubjectIds = ''; // or any default value or action
        }

        $user = User::find($user_id);

        $returnHTML = view('user.forms.education.education_edit_modal')
            ->with('user', $user)
            ->with('profileEducation', $profileEducation)
            ->with('degreeLevels', $degreeLevels)
            ->with('resultTypes', $resultTypes)
            ->with('majorSubjects', $majorSubjects)
            ->with('profileEducationMajorSubjectIds', $profileEducationMajorSubjectIds)
            ->with('countries', $countries)
            ->render();
        return response()->json(array('success' => true, 'html' => $returnHTML,'state_id' => $profileEducation->state_id, 'city_id' => $profileEducation->city_id, 'degree_type_id' => $profileEducation->degree_type_id));
    }

    public function updateProfileEducation(ProfileEducationFormRequest $request, $education_id, $user_id)
    {

        $profileEducation = ProfileEducation::find($education_id);
        $profileEducation = $this->assignEducationValues($profileEducation, $request, $user_id);
        $profileEducation->update();
        /*         * ************************************ */
        $this->storeprofileEducationMajorSubjects($request, $profileEducation->id);
        /*         * ************************************ */

        $returnHTML = view('admin.user.forms.education.education_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    public function updateFrontProfileEducation(ProfileEducationFormRequest $request, $education_id, $user_id)
    {

        $profileEducation = ProfileEducation::find($education_id);
        $profileEducation = $this->assignEducationValues($profileEducation, $request, $user_id);
        $profileEducation->update();
        /*         * ************************************ */
        $this->storeprofileEducationMajorSubjects($request, $profileEducation->id);
        /*         * ************************************ */

        $returnHTML = view('user.forms.education.education_edit_thanks')->render();
        return response()->json(array('success' => true, 'status' => 200, 'html' => $returnHTML), 200);
    }

    private function storeprofileEducationMajorSubjects($request, $profile_education_id)
    {
        if ($request->has('major_subjects')) {
            ProfileEducationMajorSubject::where('profile_education_id', '=', $profile_education_id)->delete();
            $major_subjects = $request->input('major_subjects');
            foreach ($major_subjects as $major_subject_id) {
                $profileEducationMajorSubject = new ProfileEducationMajorSubject();
                $profileEducationMajorSubject->profile_education_id = $profile_education_id;
                $profileEducationMajorSubject->major_subject_id = $major_subject_id;
                $profileEducationMajorSubject->save();
            }
        }
    }

    public function deleteAllProfileEducation($user_id)
    {
        $profileEducations = ProfileEducation::where('user_id', '=', $user_id)->get();
        foreach ($profileEducations as $profileEducation) {
            echo $this->removeProfileEducation($profileEducation->id);
        }
    }

    public function deleteProfileEducation(Request $request)
    {
        $id = $request->input('id');
        echo $this->removeProfileEducation($id);
    }

    private function removeProfileEducation($id)
    {
        try {
            $profileEducation = ProfileEducation::findOrFail($id);
            ProfileEducationMajorSubject::where('profile_education_id', '=', $id)->delete();
            $profileEducation->delete();
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

}
