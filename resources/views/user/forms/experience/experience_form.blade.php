<div class="modal-body">
    <div class="form-body">
        <div class="row">
        

        <div class="formrow col-md-6 col-sm-12 my-2" id="div_company">
            <label for=""> Company Name</label>
            <input class="form-control" id="company" placeholder="{{__('Company')}}" name="company" type="text" value="{{(isset($profileExperience)? $profileExperience->company:'')}}">
            <span class="help-block company-error"></span> </div>
        <div class="formrow col-md-6 col-sm-12 my-2" id="div_title">
            <label for="">Designation </label>
            <input class="form-control" id="title" placeholder="{{__('Designation')}}" name="title" type="text" value="{{(isset($profileExperience)? $profileExperience->title:'')}}">
            <span class="help-block title-error"></span> </div>
        {{--<div class="formrow col-md-6 col-sm-12 my-2" id="div_country_id">
            <label for=""> Select Country </label>
            <?php
            $country_id = (isset($profileExperience) ? $profileExperience->country_id : $siteSetting->default_country_id);
            ?>
            {!! Form::select('country_id', [''=>__('Select Country')]+$countries, $country_id, array('class'=>'form-control', 'id'=>'experience_country_id')) !!}
            <span class="help-block country_id-error"></span> </div>

        <div class="formrow col-md-6 col-sm-12 my-2" id="div_state_id">
            <label for=""> Select State </label>
            <span id="default_state_experience_dd">
                {!! Form::select('state_id', [''=>__('Select State')], null, array('class'=>'form-control', 'id'=>'experience_state_id')) !!}
            </span>
            <span class="help-block state_id-error"></span> </div>

        <div class="formrow col-md-6 col-sm-12 my-2" id="div_city_id">
            <label for=""> Select City </label>
            <span id="default_city_experience_dd">
                {!! Form::select('city_id', [''=>__('Select City')], null, array('class'=>'form-control', 'id'=>'city_id')) !!}
            </span>
            <span class="help-block city_id-error"></span> 
        
        </div>--}}
        </div>

        @php
    $years = DB::table('years')->get();
    $months = DB::table('months')->get();
   @endphp


        <div class="formrow">
           <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Entry YEAR</label>
                    <select class="form-control exp_entry_year" id="birth_year" name="entrance_year">
                        <option value="" disabled>Year</option>
                        @foreach($years as $year)
                        <option <?php if(!empty($profileExperience->entrance_year) && $profileExperience->entrance_year == $year->id): echo "selected";endif;  ?> value="{{$year->id}}">{{$year->year_value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6" id="month_div_show_edu_modal">
                    <label for="">Entry MONTH </label>
                    <select class="form-control"  name="entrance_month">
                    @foreach($months as $month)
                        <option  <?php if(!empty($profileExperience->entrance_year) && $profileExperience->entrance_month == $month->id): echo "selected";endif;  ?> value="{{$month->id}}">{{$month->eng_title}}</option>
                    @endforeach
                    </select>
                </div>
                  <div class="formrow col-md-12" id="div_is_currently_working">
                    <label for="is_currently_working" class="bold">{{__('Currently Working?')}}</label>
                    <div class="radio-list">
                        <?php
                        $val_1_checked = '';
                        $val_2_checked = 'checked="checked"';
        
                        if (isset($profileExperience) && $profileExperience->is_currently_working == 1) {
                            $val_1_checked = 'checked="checked"';
                            $val_2_checked = '';
                        }
                        ?>
                        <label class="radio-inline"><input id="currently_working" name="is_currently_working" type="radio" value="1" {{$val_1_checked}}> {{__('Yes')}} </label>
                        <label class="radio-inline"><input id="not_currently_working" name="is_currently_working" type="radio" value="0" {{$val_2_checked}}> {{__('No')}} </label>
                    </div>
                    <span class="help-block is_currently_working-error"></span>
                </div>
                </div>
                @if (!@$profileExperience->is_currently_working == 1) 
                <div class="formrow mt-3" id="div_id_resign_year">
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Resign YEAR</label>
                        <select class="form-control ex_resign_year" id="birth_year" name="pass_year">
                            <option value="" disabled>Year</option>
                            @foreach($years as $year)
                            <option  <?php if(!empty($profileExperience->pass_year) && $profileExperience->pass_year == $year->id): echo "selected";endif;  ?> value="{{$year->id}}">{{$year->year_value}}</option>
                            @endforeach
                        </select>
                        <div id="ex_pass_error"></div>
                    </div>
                    <div class="form-group col-md-6" id="month_div_show_pass_modal">
                        <label for="">Resign MONTH </label>
                        <select class="form-control"  name="pass_month">
                        @foreach($months as $month)
                            <option   <?php if(!empty($profileExperience->pass_month) && $profileExperience->pass_month == $month->id): echo "selected";endif;  ?> value="{{$month->id}}">{{$month->eng_title}}</option>
                        @endforeach
                        </select>
                        <div id="ex_month_error"></div>
                    </div>
                </div>
                </div>
                @endif
                
            </div>
        <!--</div>-->
        
        {{--<div class="formrow">
            <div class="row">
                <div class="form-group col-md-6" id="div_date_start">
                    <label for="date_start" class="bold">Job Start Date</label>
                    <input class="form-control datepicker" id="date_start" placeholder="Job Start Date" name="date_start" type="text" autocomplete="off" value="{{(isset($profileExperience)? $profileExperience->date_start:'')}}">
                <span class="help-block date_start-error"></span> </div>
                
                <div class="form-group col-md-6" id="div_date_end">
                    <label for="date_end" class="bold">Job End Date</label>
                    <input class="form-control datepicker" autocomplete="off" id="date_end" placeholder="Job End Date" name="date_end" type="text" value="{{(isset($profileExperience)? $profileExperience->date_end:'')}}">
                    <span class="help-block date_end-error"></span> 
                </div>
            </div>
           
        </div>--}}

      
        {{--<div class="formrow" id="div_description">
            <textarea name="description" class="form-control" id="description" placeholder="{{__('Experience description')}}">{{(isset($profileExperience)? $profileExperience->description:'')}}</textarea>
            <span class="help-block description-error"></span> </div>--}}
    </div>
</div>