@php
        $years = DB::table('years')->get();
        $months = DB::table('months')->get();
$listoflisene = DB::table('driving_classes')->get();
    @endphp
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_skill" method="PUT" action="{{ route('update.front.profile.skill.driving', [$profileSkill->id,$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
                <h4 class="modal-title">{{__('Edit Certification')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
              <div class="license_div_container px-5">
                  <div class="row py-2">
                      <div class="col-md-6">
                          <label class=" fw-bolder d-block input-label mb-1" for="english-lan">Driving Lincense</label>
                           <?php
                                $driving_class_id = (isset($profileSkill) ? $profileSkill->driving_class_id : null);
                                ?>
                            <select class="input-box deep-placeholder select_driving_class_edit mr-4" name="driving_class_id" id="driving_class_id_edit" required>
                                @foreach($listoflisene as $linces)
                                <option value="{{$linces->id}}" {{$linces->id == $driving_class_id ? 'selected': ''}}>{{$linces->class_name}}</option>
                                @endforeach
                            </select>
                      </div>
                      <div class="col-md-6">
                          <label class=" fw-bolder d-block input-label mb-1" for="english-lan">&nbsp;</label>
                          @php 
                         $data = App\Models\DrivingCategory::where('class_id', $driving_class_id)->get();
                         $driving_cat_id = (isset($profileSkill) ? $profileSkill->driving_cat_id : null);
                          @endphp
                          <select class="input-box deep-placeholder ms-4" name="driving_cat_id" id="driving_cat_id_edit" required>
                              @foreach($data as $cat)
                              <option value="{{$cat->id}}" {{$cat->id == $driving_cat_id ? 'selected': ''}}>{{$cat->eng_title}}</option>
                              @endforeach
                            </select>
                      </div>
                      
                  </div>
                 <div class="custom-flex py-2">
                     <?php
                                $pass_year = (isset($profileSkill) ? $profileSkill->pass_year : null);
                                ?>
                    <select class="input-box deep-placeholder mr-4" name="driving_pass_year" id="year" required>
                      <option value>Select Driving Expiry Year</option>
                       @foreach($years as $year)
                        <option value="{{$year->id}}" {{$year->id == $pass_year ? 'selected' : ''}}>{{$year->year_value}}</option>
                        @endforeach
                    </select>
            
                    <select class="input-box deep-placeholder ms-4" name="driving_pass_month" id="month" required>
                        <?php
                        $pass_month = (isset($profileSkill) ? $profileSkill->pass_month : null);
                        ?>
                      <option value>Select Driving Expiry month</option>
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