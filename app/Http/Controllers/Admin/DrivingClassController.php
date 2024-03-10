<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use Input;
use Redirect;
use App\Models\DrivingClass;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;

class DrivingClassController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function indexdrivingclass()
    {
        return view('admin.driving_class.index');
    }

    public function createDrivingclass()
    {
        return view('admin.driving_class.add');
    }

    public function storeDrivingclass(Request $request)
    {
        $language = new DrivingClass();
        $language->class_name = $request->input('class_name');
        $language->is_active = $request->input('is_active');
        $language->save();
        flash('Data has been added!')->success();
        return \Redirect::route('edit.drivingclass', array($language->id));
    }

    public function editDrivingclass($id)
    {
        $language = DrivingClass::findOrFail($id);
        return view('admin.driving_class.edit')
                        ->with('language', $language);
    }

    public function updateDrivingclass(Request $request, $id)
    {
        $language = DrivingClass::findOrFail($id);
        $language->class_name = $request->input('class_name');
        $language->is_active = $request->input('is_active');
        $language->update();
        flash('Data has been updated!')->success();
        return \Redirect::route('edit.drivingclass', array($language->id));
    }

    public function deleteDrivingclass(Request $request)
    {
        $id = $request->input('id');
        try {
            $language = DrivingClass::findOrFail($id);
            $language->delete();
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    public function fetchdrivingclassData(Request $request)
    {
        $languages = DrivingClass::select([
                    'driving_classes.id', 'driving_classes.class_name', 'driving_classes.is_active'])->sorted();
        return Datatables::of($languages)
                        ->filter(function ($query) use ($request) {
                            
                            if ($request->has('is_active') && $request->is_active != -1) {
                                $query->where('driving_classes.is_active', '=', "{$request->get('is_active')}");
                            }
                            
                        })
                        
                        ->addColumn('action', function ($languages) {
                            /*                             * ************************* */
                            $activeTxt = 'Make Active';
                            $activeHref = 'makeActive(' . $languages->id . ');';
                            $activeIcon = 'square-o';
                            if ((int) $languages->is_active === 1) {
                                $activeTxt = 'Make InActive';
                                $activeHref = 'makeNotActive(' . $languages->id . ');';
                                $activeIcon = 'check-square-o';
                            }
                            return '
				<div class="btn-group">
					<button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="' . route('edit.drivingclass', ['id' => $languages->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
						</li>						
						<li>
							<a href="javascript:void(0);" onclick="deleteLanguage(' . $languages->id . ', ' . $languages->is_default . ');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
						</li>
						<li>
						<a href="javascript:void(0);" onClick="' . $activeHref . '" id="onclickActive' . $languages->id . '"><i class="fa fa-' . $activeIcon . '" aria-hidden="true"></i>' . $activeTxt . '</a>
						</li>																																		
					</ul>
				</div>';
                        })
                        ->setRowId(function($languages) {
                            return 'languageDtRow' . $languages->id;
                        })
                        ->make(true);
        //$query = $dataTable->getQuery()->get();
        //return $query;
    }

    public function makeActiveDrivingclass(Request $request)
    {
        $id = $request->input('id');
        try {
            $language = DrivingClass::findOrFail($id);
            $language->is_active = 1;
            $language->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeNotActiveDrivingclass(Request $request)
    {
        $id = $request->input('id');
        try {
            $language = DrivingClass::findOrFail($id);
            $language->is_active = 0;
            $language->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

}
