<?php

namespace App\Http\Controllers\Admin;
use Auth;
use DB;
use Input;
use Redirect;
use App\Models\DrivingClass;
use App\Models\DrivingCategory;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\DrivingCategoryFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class DrivingCategoryController extends Controller
{
    public function indexDrivingCategory()
    {
        $languages = DataArrayHelper::drivingClassCodeArray();
       
        return view('admin.driving_category.index')->with('languages', $languages);
    }

    public function createDrivingCategory()
    {
        $languages = DataArrayHelper::drivingClassCodeArray();
        return view('admin.driving_category.add')
                        ->with('languages', $languages);
    }

    public function storeDrivingCategory(DrivingCategoryFormRequest $request)
    {
        $languageLevel = new DrivingCategory();
        $languageLevel->class_id = $request->input('class_id');
        $languageLevel->eng_title = $request->input('eng_title');
        // $languageLevel->jp_title = $request->input('jp_title');
        $languageLevel->save();
        
        flash('Category has been added!')->success();
        return \Redirect::route('edit.driving.category', array($languageLevel->id));
    }

    public function editDrivingCategory($id)
    {
        $languages = DataArrayHelper::drivingClassCodeArray();
        $languageLevel = DrivingCategory::findOrFail($id);
        return view('admin.driving_category.edit')
                        ->with('languages', $languages)
                        ->with('languageLevel', $languageLevel);
    }

    public function updateDrivingCategory($id, DrivingCategoryFormRequest $request)
    {
        $languageLevel = DrivingCategory::findOrFail($id);
         $languageLevel->class_id = $request->input('class_id');
        $languageLevel->eng_title = $request->input('eng_title');
        // $languageLevel->jp_title = $request->input('jp_title');
        
        $languageLevel->update();
        flash('Category has been updated!')->success();
        return \Redirect::route('edit.driving.category', array($languageLevel->id));
    }

    public function deleteDrivingCategory(Request $request)
    {
        $id = $request->input('id');
        try {
            $languageLevel = DrivingCategory::findOrFail($id);
           
            $languageLevel->delete();
            
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    public function fetchDrivingCategoryData(Request $request)
    {
        $languageTypes = DrivingCategory::select([
                    'driving_categories.id', 'driving_categories.class_id', 'driving_categories.eng_title', 'driving_categories.jp_title'])->sorted();
        return Datatables::of($languageTypes)
                        ->filter(function ($query) use ($request) {
                            if ($request->has('class_id') && !empty($request->class_id)) {
                                $query->where('driving_categories.class_id', 'like', "{$request->get('class_id')}");
                            }
                            if ($request->has('eng_title') && !empty($request->eng_title)) {
                                $query->where('driving_categories.eng_title', 'like', "%{$request->get('eng_title')}%");
                            }
                           
                        })
                        ->addColumn('class_id', function ($languageTypes) {
                            return $languageTypes->drivingclass->class_name;
                        })
                        ->addColumn('action', function ($languageTypes) {
                            /*                             * ************************* */
                            
                            return '
				<div class="btn-group">
					<button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="' . route('edit.driving.category', ['id' => $languageTypes->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
						</li>						
						<li>
							<a href="javascript:void(0);" onclick="deleteLanguageLevel(' . $languageTypes->id .');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
						</li>																																		
					</ul>
				</div>';
                        })
                        ->rawColumns(['action', 'language_level'])
                        ->setRowId(function($languageTypes) {
                            return 'languageLevelDtRow' . $languageTypes->id;
                        })
                        ->make(true);
        //$query = $dataTable->getQuery()->get();
        //return $query;
    }
}
