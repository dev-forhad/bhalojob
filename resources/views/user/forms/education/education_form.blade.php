<div class="modal-body">
    <div class="form-body">

        @php
            $years = DB::table('years')->get();
            $months = DB::table('months')->get();
        @endphp
        <div class="row">
            <div class="form-group col-md-12" id="div_degree_level_id">
                <label for="degree_level_id" class="bold">Degree Level</label>
                <?php
                $degree_level_id = (isset($profileEducation) ? $profileEducation->degree_level_id : null);
                ?>
                {!! Form::select('degree_level_id', [''=>'Select Degree Level']+$degreeLevels, $degree_level_id, array('class'=>'form-control', 'id'=>'degree_level_id')) !!}
                <span class="help-block degree_level_id-error"></span> 
            </div>
            <div class="form-group col-md-12" id="div_institution">
            <label for="institution" class="bold">Institution</label>
            <input class="form-control" id="institution" placeholder="Institution" name="institution_name" type="text" value="{{(isset($profileEducation)? $profileEducation->institution_name:'')}}">
            <span class="help-block institution-error"></span> </div>
            @php
                $years = DB::table('years')->get();
                $months = DB::table('months')->get();
               @endphp

                <div class="form-group col-md-6">
                    <label for="">ENTRANCE YEAR</label>
                    <select class="form-control entry_year" id="birth_year"    onchange="showPageOthers('#month_div_show_edu_modal')" name="entrance_year">
                        <option value="" disabled>Year</option>
                        @foreach($years as $year)
                        <option <?php if(!empty($profileEducation->entrance_year) && $profileEducation->entrance_year == $year->id): echo "selected";endif;  ?> value="{{$year->id}}">{{$year->year_value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6" id="month_div_show_edu_modal" style="display: <?php if(empty($profileEducation->entrance_month)): echo "none";endif;  ?>">
                    <label for="">ENTRANCE MONTH </label>
                    <select class="form-control"  name="entrance_month">
                    @foreach($months as $month)
                        <option  <?php if(!empty($profileEducation->entrance_year) && $profileEducation->entrance_month == $month->id): echo "selected";endif;  ?> value="{{$month->id}}">{{$month->eng_title}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">PASS YEAR</label>
                    <select class="form-control pass_year_edit" id="birth_year"    onchange="showPageOthers('#month_div_show_pass_modal')" name="pass_year">
                        <option value="" disabled>Year</option>
                        @foreach($years as $year)
                        <option  <?php if(!empty($profileEducation->pass_year) && $profileEducation->pass_year == $year->id): echo "selected";endif;  ?> value="{{$year->id}}">{{$year->year_value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6" id="month_div_show_pass_modal" style="display:  <?php if(empty($profileEducation->pass_month)): echo "none";endif;  ?>">
                    <label for="">PASS MONTH </label>
                    <select class="form-control"  name="pass_month">
                    @foreach($months as $month)
                        <option   <?php if(!empty($profileEducation->pass_month) && $profileEducation->pass_month == $month->id): echo "selected";endif;  ?> value="{{$month->id}}">{{$month->eng_title}}</option>
                    @endforeach
                    </select>
                </div>
                <div id="pass_error_edit"></div>

                <div class="form-group col-md-12" id="div_major">
                    <label for="major" class="bold">Major</label>
                    <input class="form-control" id="major" placeholder="Major" name="major" type="text" value="{{(isset($profileEducation)? $profileEducation->major:'')}}">
                    <span class="help-block institution-error"></span> 
                </div>

        </div>


    </div>
</div>

 

