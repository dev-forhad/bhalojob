<hr>

<h5>{{__('Personal Information')}}</h5>

<div class="row">
   
    <!-- personal information start  -->
    <div class="form-group col-md-6">
        <label class="bold">First Or Middle Name</label>
        <input class="form-control" type="text" name="first_name" value="{{$user->first_name}}">
    </div>
    <div class="form-group col-md-6">
        <label for="lastName"> Last Name</label>
        <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control">
    </div>
    @php
        $years = DB::table('years')->get();
        $months = DB::table('months')->get();
        $days = DB::table('days')->get();
        $maritalStatus = DB::table('marital_statuses')->get();
        $genders = DB::table('genders')->get();
        $currentVisas = DB::table('currentvisas')->get();
    @endphp
    <div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Birth Year</label>
                <select class="form-control" id="birth_year" onchange="showPage('#month_div_show')"
                        name="birth_year" required>
                    <option>Year</option>
                    @foreach($years as $year)
                        <option value="{{$year->id}}" {{($year->id == $user->birth_year) ? 'selected' : ''}}>{{$year->year_value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4" id="month_div_show" style="display: <?php if(empty($user->birth_month)): echo "none"; endif; ?>">
                <label for="">Month</label>
                <select class="form-control" onchange="showPage('#day_div_show')"
                        name="birth_month">
                    @foreach($months as $month)
                        <option value="{{$month->id}}" {{($month->id == $user->birth_month) ? 'selected' : ''}}>{{$month->eng_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4" id="day_div_show" style="display: <?php if(empty($user->birth_day)): echo "none"; endif; ?>">
                <label for="">Day</label>
                <select class="form-control" name="birth_day">
                    @foreach($days as $day)
                        <option value="{{$day->id}}" {{($day->id == $user->birth_day) ? 'selected' : ''}}>{{$day->id}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="">Gender</label>
        <select class="form-control" id="gender_id" name="gender_id">
            <option>Select Gender</option>
            @foreach($genders as $gender)
                <option value="{{$gender->id}}" {{($gender->id == $user->gender_id) ? 'selected' : ''}}>{{$gender->gender}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label> Email </label>
        <input type="email" name="email" value="{{$user->email}}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label> Marital Status </label>
        <select class="form-control" id="marital_status_id" name="marital_status_id">
            <option value="" disabled>Select Marital Status</option>
            @foreach($maritalStatus as $status)
                <option value="{{$status->id}}" {{($status->id == $user->marital_status_id) ? 'selected' : ''}}>{{$status->marital_status}}</option>
            @endforeach
        </select>
    </div>
    </div>

    

    <!-- personal information end   -->


    <!-- personal information  if stay japan   -->
    <div class="row mt-2">
    <div class="col-md-12">
        <div class="form-title">
            <h4 class="heading"> JAPAN ADDRESS(IF YOU ARE IN JAPAN) </h4>
        </div>
    </div>
    <!-- <div class="form-group col-md-12">
    <label class="bold">Postal Code</label>
        <input class="form-control" type="text"    name="personal_information[postal_code]" value="">
    </div> -->


    <!-- <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
            <label for="">{{__('Country')}}</label>
            <?php $country_id = old('country_id', (isset($user) && (int)$user->country_id > 0) ? $user->country_id : $siteSetting->default_country_id); ?>
            {!! Form::select('country_id', [''=>__('Select Country')]+$countries, $country_id, array('class'=>'form-control required', 'id'=>'country_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} </div>
    </div> -->

    <!-- <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id') !!}">
            <label for="">{{__('Prefecture')}}</label>
            <span id="state_dd">
                {!! Form::select('state_id', [''=>__('Select State')], null, array('class'=>'form-control required', 'id'=>'state_id')) !!} 
            </span> 
                {!! APFrmErrHelp::showErrors($errors, 'state_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
            <label for="">{{__('City')}}</label>
            <span id="city_dd"> {!! Form::select('city_id', [''=>__('Select City')], null, array('class'=>'form-control required', 'id'=>'city_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
        </div>
    </div> -->
    <div class="form-group col-md-6">
        <label for="Prefecture">Prefecture</label>
        <input type="text" name="prefecture" value="{{$user->prefecture}}" class="form-control" >
    </div>

    <div class="form-group col-md-6">
        <label for="=City">City</label>
        <input type="text" name="jp_city" value="{{$user->jp_city}}" class="form-control" >
    </div>

    <div class="form-group col-md-6">
        <label for="Street Address">Street Address</label>
        <input type="text" name="street_address" value="{{$user->street_address}}" class="form-control">
    </div>

    <div class="form-group col-md-6">
        <label for="lastName">JP Cell Phone</label>
        <input type="number" name="jp_cell_phone" value="{{$user->jp_cell_phone}}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="lastName">Emergency Contact Name In JP</label>
        <input type="number" name="emergency_contact_jp" value="{{$user->emergency_contact_jp}}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label> Current Visa Status </label>

        <select class="form-control" name="current_visa_status_id">
            <option value="" disabled>Select Current Visa Status</option>
            @foreach($currentVisas as $visaStatus)
                <option value="{{$visaStatus->id}}" {{($visaStatus->id == $user->current_visa_status_id) ? 'selected' : ''}}>{{$visaStatus->eng_title}}</option>
            @endforeach
        </select>


    </div>
    <div class="form-group col-md-6">
        <label> Emergency Cell Phone </label>
        <input type="number" name="emergency_cell_phone" value="{{$user->emergency_cell_phone}}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Visa Expiry Year</label>
                <select class="form-control" id="birth_year"    onchange="showPageVisaExpire('#month_div_show_visa_expire')" name="jp_visa_expiry_year"
                        required>
                    <option value="" disabled>Year</option>
                    @foreach($years as $year)
                        <option value="{{$year->id}}" {{($year->id == $user->jp_visa_expiry_year) ? 'selected' : ''}}>{{$year->year_value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4" id="month_div_show_visa_expire" style="display: <?php if(empty($user->jp_visa_expiry_month)): echo "none"; endif; ?>">
                <label for="">Expiry Month</label>
                <select class="form-control" onchange="showPageVisaExpire('#day_div_show_visa_expire')"
                        name="jp_visa_expiry_month"
                        required>
                    @foreach($months as $month)
                        <option value="{{$month->id}}" {{($month->id == $user->jp_visa_expiry_month) ? 'selected' : ''}}>{{$month->eng_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4" id="day_div_show_visa_expire" style="display: <?php if(empty($user->jp_visa_expiry_day)): echo "none"; endif; ?>">
                <label for="">Visa Expiry Day</label>
                <select class="form-control" name="jp_visa_expiry_day" required>
                    @foreach($days as $day)
                        <option value="{{$day->id}}" {{($day->id == $user->jp_visa_expiry_day) ? 'selected' : ''}}>{{$day->id}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    <!-- personal information  if stay japan  end   -->


    <!-- personal information  your country details start   -->

    <div class="col-md-12">
        <div class="form-title">
            <h4 class="heading"> YOUR COUNTRY ADDRESS </h4>
        </div>
    </div>


    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id_bd') !!}">
            <label for="">{{__('Country')}}</label>
            <?php $country_id = old('country_id_bd', (isset($user) && (int)$user->country_id_bd > 0) ? $user->country_id_bd : $siteSetting->default_country_id); ?>
           
            {!! Form::select('country_id_bd', [''=>__('Select Country')]+$countries, $country_id, array('class'=>'form-control required', 'id'=>'country_id_bd')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'country_id_bd') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id_bd') !!}">
            <label for="">{{__('State')}}</label>
            <span id="state_bd">
                <?php $stateid = old('state_id_bd', (isset($user) && (int)$user->state_id_bd > 0) ? $user->state_id_bd : ''); ?>
                
                {!! Form::select('state_id_bd', [''=>__('Select State')], $stateid, array('class'=>'form-control required', 'id'=>'state_id_bd')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'state_id_bd') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id_bd') !!}">
            <label for="">{{__('City')}}</label>
            <?php $city_id = old('city_id_bd', (isset($user) && (int)$user->city_id_bd > 0) ? $user->city_id_bd : ''); ?>
            <span id="city_bd"> {!! Form::select('city_id_bd', [''=>__('Select City')], $city_id, array('class'=>'form-control required', 'id'=>'city_id_bd')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'city_id_bd') !!}
        </div>
    </div>


    <div class="form-group col-md-6">
        <label for="lastName">Postal Code</label>
        <input type="text" name="bd_postal_code" value="{{$user->bd_postal_code}}" class="form-control" required>
    </div>
    <div class="form-group col-md-6">
        <label for="lastName">Address</label>
        <input type="text" name="bd_address" value="{{$user->bd_address}}" class="form-control" required>
    </div>
    <div class="form-group col-md-6">
        <label for="lastName">Country Cell Phone</label>
        <input type="number" name="bd_cell_phone" value="{{$user->bd_cell_phone}}" class="form-control" required>
    </div>


    <div class="form-group col-md-6">
        <label for="lastName">Children</label>
        <input type="text" name="bd_children" value="{{$user->bd_children}}" class="form-control" required>
    </div>


    <!-- personal information  your country details end   -->
</div>


<style>


    .label {
        display: inline-block;
        background-color: #3498db;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .label .text {
        font-size: 14px;
        font-weight: bold;
    }

    .heading {
        font-family: Arial, sans-serif;
        font-size: 28px;
        font-weight: bold;
        color: #333;
        background-color: #f1f1f1;
        padding: 10px;
        border-radius: 4px;
        text-align: center;
    }

</style>



@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            initdatepicker();
            $('#salary_currency').typeahead({
                source: function (query, process) {
                    return $.get("{{ route('typeahead.currency_codes') }}", {query: query}, function (data) {
                        console.log(data);
                        data = $.parseJSON(data);
                        return process(data);
                    });
                }
            });

            $('#country_id').on('change', function (e) {
                e.preventDefault();
                filterStates(0);
            });

            $(document).on('change', '#state_id', function (e) {
                e.preventDefault();
                filterCities(0);
            });
            filterStates(<?php echo old('state_id', $user->state_id); ?>);

// bd script start

            $('#country_id_bd').on('change', function (e) {
                e.preventDefault();
                filterStatesbd(0);
            });
            $(document).on('change', '#state_id_bd', function (e) {
                e.preventDefault();
                filterCitiesbd(0);
            });
            filterStatesbd(<?php echo old('state_id_bd', $user->state_id); ?>);

// bd script end 

            /*******************************/
            var fileInput = document.getElementById("image");
            fileInput.addEventListener("change", function (e) {
                var files = this.files
                showThumbnail(files)
            }, false)

            var fileInput_cover_image = document.getElementById("cover_image");

            fileInput_cover_image.addEventListener("change", function (e) {

                var files_cover_image = this.files

                showThumbnail_cover_image(files_cover_image)

            }, false)


            function showThumbnail(files) {
                $('#thumbnail').html('');
                for (var i = 0; i < files.length; i++) {
                    var file = files[i]
                    var imageType = /image.*/
                    if (!file.type.match(imageType)) {
                        console.log("Not an Image");
                        continue;
                    }
                    var reader = new FileReader()
                    reader.onload = (function (theFile) {
                        return function (e) {
                            $('#thumbnail').append('<div class="fileattached"><img height="100px" src="' + e.target.result + '" > <div>' + theFile.name + '</div><div class="clearfix"></div></div>');
                        };
                    }(file))
                    var ret = reader.readAsDataURL(file);
                }
            }


            function showThumbnail_cover_image(files) {

                $('#thumbnail_cover_image').html('');

                for (var i = 0; i < files.length; i++) {

                    var file = files[i]

                    var imageType = /image.*/

                    if (!file.type.match(imageType)) {

                        console.log("Not an Image");

                        continue;

                    }

                    var reader = new FileReader()

                    reader.onload = (function (theFile) {

                        return function (e) {

                            $('#thumbnail_cover_image').append('<div class="fileattached"><img height="100px" src="' + e.target.result + '" > <div>' + theFile.name + '</div><div class="clearfix"></div></div>');

                        };

                    }(file))

                    var ret = reader.readAsDataURL(file);

                }

            }


        });


        //state bd filter start
        function filterStatesbd(state_id) {
            var country_id = $('#country_id_bd').val();
            if (country_id != '') {
                $.post("{{ route('filter.lang.states.dropdown.bd') }}", {
                    country_id: country_id,
                    state_id: state_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {
                        $('#state_bd').html(response);
                        filterCitiesbd(<?php echo old('city_id_bd', $user->city_id_bd); ?>);
                    });
            }
        }


        //state bd filter end


        function filterStates(state_id) {
            var country_id = $('#country_id').val();
            if (country_id != '') {
                $.post("{{ route('filter.lang.states.dropdown') }}", {
                    country_id: country_id,
                    state_id: state_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {
                        $('#state_dd').html(response);
                        filterCities(<?php echo old('city_id', $user->city_id); ?>);
                    });
            }
        }

        function filterCities(city_id) {
            var state_id = $('#state_id').val();
            if (state_id != '') {
                $.post("{{ route('filter.lang.cities.dropdown') }}", {
                    state_id: state_id,
                    city_id: city_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {
                        $('#city_dd').html(response);
                    });
            }
        }

        function filterCitiesbd(city_id_bd) {
            var state_id = $('#state_id_bd').val();
            // alert(state_id)
            if (state_id != '') {
                $.post("{{ route('filter.lang.cities.dropdown.bd') }}", {
                    state_id: state_id,
                    city_id: city_id_bd,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {

                        // console.log("get respon form output", response);
                        $('#city_bd').html(response);
                    });
            }
        }

        // function initdatepicker() {
        //     $(".datepicker").datepicker({
        //         autoclose: true,
        //         format: 'yyyy-m-d'
        //     });
        // }
    </script>

@endpush







@push('scripts')

    <script type="text/javascript">

        /**************************************************/


        function showPageOthers(showdiv) {
            $(showdiv).show();
        }


        function initdatepicker() {

            $(".datepicker").datepicker({

                autoclose: true,

                format: 'yyyy-m-d'

            });

            /*****/

            $('.select2-multiple').select2({

                placeholder: "{{__('Select Major Subjects')}}",

                allowClear: true

            });

        }


    </script>

@endpush