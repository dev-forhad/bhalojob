<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DB;
use Input;
use Redirect;
use App\Language;
use App\Models\LanguageType;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\LanguageTypeFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class LanguageTypeController extends Controller
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

    public function indexLanguageTypes()
    {
        $languages = DataArrayHelper::languagesTypeCodeArray();
       
        return view('admin.language_type.index')->with('languages', $languages);
    }

    public function createLanguageTypes()
    {
        $languages = DataArrayHelper::languagesTypeCodeArray();
        return view('admin.language_type.add')
                        ->with('languages', $languages);
    }

    public function storeLanguageTypes(LanguageTypeFormRequest $request)
    {
        $languageLevel = new LanguageType();
        $languageLevel->lang_id = $request->input('lang_id');
        $languageLevel->eng_title = $request->input('eng_title');
        $languageLevel->jp_title = $request->input('jp_title');
        $languageLevel->save();
        
        flash('Language Types has been added!')->success();
        return \Redirect::route('edit.language.types', array($languageLevel->id));
    }

    public function editLanguageTypes($id)
    {
        $languages = DataArrayHelper::languagesTypeCodeArray();
        $languageLevel = LanguageType::findOrFail($id);
        return view('admin.language_type.edit')
                        ->with('languages', $languages)
                        ->with('languageLevel', $languageLevel);
    }

    public function updateLanguageTypes($id, LanguageTypeFormRequest $request)
    {
        $languageLevel = LanguageType::findOrFail($id);
         $languageLevel->lang_id = $request->input('lang_id');
        $languageLevel->eng_title = $request->input('eng_title');
        $languageLevel->jp_title = $request->input('jp_title');
        
        $languageLevel->update();
        flash('Language Type has been updated!')->success();
        return \Redirect::route('edit.language.types', array($languageLevel->id));
    }

    public function deleteLanguageTypes(Request $request)
    {
        $id = $request->input('id');
        try {
            $languageLevel = LanguageType::findOrFail($id);
           
            $languageLevel->delete();
            
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    public function fetchLanguageTypesData(Request $request)
    {
        $languageTypes = LanguageType::select([
                    'language_types.id', 'language_types.lang_id', 'language_types.eng_title', 'language_types.jp_title'])->sorted();
        return Datatables::of($languageTypes)
                        ->filter(function ($query) use ($request) {
                            if ($request->has('lang_id') && !empty($request->lang_id)) {
                                $query->where('language_types.lang_id', 'like', "{$request->get('lang_id')}");
                            }
                            if ($request->has('eng_title') && !empty($request->eng_title)) {
                                $query->where('language_types.eng_title', 'like', "%{$request->get('eng_title')}%");
                            }
                            if ($request->has('jp_title') && $request->jp_title) {
                                $query->where('language_types.jp_title', 'like', "%{$request->get('jp_title')}%");
                            }
                        })
                        ->addColumn('lang_id', function ($languageTypes) {
                            return $languageTypes->language->lang;
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
							<a href="' . route('edit.language.types', ['id' => $languageTypes->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
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
