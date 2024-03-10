@php
        $years = DB::table('years')->get();
        $months = DB::table('months')->get();
$listoflisene = DB::table('driving_classes')->get();
    @endphp
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_skill" method="PUT" action="{{ route('update.front.profile.skill', [$profileSkill->id,$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
                <h4 class="modal-title">{{__('Edit Certification')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
  <div class="lang_div">
    <label class=" fw-bolder d-block input-label mb-1" for="english-lan"><span id="cert_name"></span> language</label>
        <select class="input-box input-text-color" name="lang_type_id" id="certificate_language_type_id">
          
        </select>
    
    <div class="custom-flex py-2">
        <select class="input-box deep-placeholder mr-4" name="pass_year" id="year" required>
          <option value>Select year</option>
           @foreach($years as $year)
            <option value="{{$year->id}}">{{$year->year_value}}</option>
            @endforeach
        </select>

        <select class="input-box deep-placeholder ms-4" name="pass_month" id="month" required>
          <option value>Select month</option>
            @foreach($months as $month)
                <option value="{{$month->id}}">{{$month->eng_title}}</option>
            @endforeach
        </select>
    </div>
  </div>
  <div class="license_div">
      <div class="row py-2">
          <div class="col-md-6">
              <label class=" fw-bolder d-block input-label mb-1" for="english-lan"><span id="license_name"></span></label>
                <select class="input-box deep-placeholder select_driving_class mr-4" name="driving_class_id" id="driving_class_id" required>
                    @foreach($listoflisene as $linces)
                    <option value="{{$linces->id}}">{{$linces->class_name}}</option>
                    @endforeach
                </select>
          </div>
          <div class="col-md-6">
              <label class=" fw-bolder d-block input-label mb-1" for="english-lan">&nbsp;</label>
              <select class="input-box deep-placeholder ms-4" name="driving_cat_id" id="driving_cat_id" required>
                </select>
          </div>
          
      </div>
     <div class="custom-flex py-2">
        <select class="input-box deep-placeholder mr-4" name="driving_pass_year" id="year" required>
          <option value>Select Driving Expiry Year</option>
           @foreach($years as $year)
            <option value="{{$year->id}}">{{$year->year_value}}</option>
            @endforeach
        </select>

        <select class="input-box deep-placeholder ms-4" name="driving_pass_month" id="month" required>
          <option value>Select Driving Expiry month</option>
            @foreach($months as $month)
                <option value="{{$month->id}}">{{$month->eng_title}}</option>
            @endforeach
        </select>
    </div>
  </div>
        <input type="hidden" name="skill_lang_id" class="skill_lang_id">

            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileSkillForm();">{{__('Update Certification')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->