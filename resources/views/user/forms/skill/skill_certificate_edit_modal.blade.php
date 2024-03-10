@php
    $years = DB::table('years')->get();
    $months = DB::table('months')->get();
    $listoflisene = DB::table('driving_classes')->get();
     $languageList = DB::table('languages')->get();
       $language_id = (isset($profileSkill) ? $profileSkill->lang_id : null);
     $langs =  DB::table('languages')->where('id', $language_id)->first();
    $languageinfos = DB::table('language_types')->where("lang_id",$langs->id)->get();
     
@endphp
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form" id="add_edit_profile_skill" method="PUT" action="{{ route('update.front.profile.skill.certificate', [$profileSkill->id,$user->id]) }}">{{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Edit Certification')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
          <div class="lang_div_container px-5">
            <label class=" fw-bolder d-block input-label mb-1" for="english-lan"><span id="cert_name">{{$profileSkill->getLang('lang') ?? '' }}</span> language</label>
                <?php
                    $lang_type_id = (isset($profileSkill) ? $profileSkill->lang_type_id : null);
                    ?>
                <select class="input-box input-text-color" name="lang_type_id" id="certificate_language_type_id">
                    @foreach($languageinfos as $language)
                        <option value="{{$language->id}}" {{$language->id == $lang_type_id ? 'selected' : ''}}>{{ucwords($language->eng_title)}}</a>
                    @endforeach
                </select>
            
            <div class="custom-flex py-2">
                <?php
                    $pass_year = (isset($profileSkill) ? $profileSkill->pass_year : null);
                    ?>
                <select class="input-box deep-placeholder mr-4" name="pass_year" id="year" required>
                  <option value>Select year</option>
                   @foreach($years as $year)
                    <option value="{{$year->id}}" {{$year->id == $pass_year ? 'selected' : ''}}>{{$year->year_value}}</option>
                    @endforeach
                </select>
                <?php
                    $pass_month = (isset($profileSkill) ? $profileSkill->pass_month : null);
                    ?>
                <select class="input-box deep-placeholder ms-4" name="pass_month" id="month" required>
                  <option value>Select month</option>
                    @foreach($months as $month)
                        <option value="{{$month->id}}" {{$month->id == $pass_month ? 'selected' : ''}}>{{$month->eng_title}}</option>
                    @endforeach
                </select>
            </div>
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileeditSkillForm();">{{__('Update Certification')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->