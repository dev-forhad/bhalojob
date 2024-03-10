<hr>

<h5>{{__('Personal Information')}}</h5>
@php
        $years = DB::table('years')->get();
        $months = DB::table('months')->get();
        $days = DB::table('days')->get();
        $maritalStatus = DB::table('marital_statuses')->get();
        $genders = DB::table('genders')->get();
        $currentVisas = DB::table('currentvisas')->get();
    @endphp
<div class="row">
   
    <!-- personal information start  -->
    <div class="form-group col-md-6">
        <label for="lastName"> Last Name</label>
        <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label class="bold">First Name</label>
        <input class="form-control" type="text" name="first_name" value="{{old('first_name')}}">
    </div>
    <div class="form-group col-md-6">
        <label for="">Gender</label>
        <select class="form-control" id="gender_id" name="gender_id">
            <option>Select Gender</option>
            @foreach($genders as $gender)
                <option value="{{$gender->id}}" {{($gender->id == old('gender_id')) ? 'selected' : ''}}>{{$gender->gender}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Birth Year</label>
                <select class="form-control" id="birth_year" onchange="showPage('#month_div_show')"
                        name="birth_year" required>
                    <option>Year</option>
                    @foreach($years as $year)
                        <option value="{{$year->id}}" {{$year->id == old('birth_year') ? 'selected' : ''}}>{{$year->year_value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4" id="month_div_show">
                <label for="">Month</label>
                <select class="form-control" onchange="showPage('#day_div_show')"
                        name="birth_month">
                    @foreach($months as $month)
                        <option value="{{$month->id}}" {{$month->id == old('birth_month') ? 'selected' : ''}}>{{$month->eng_title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4" id="day_div_show">
                <label for="">Day</label>
                <select class="form-control" name="birth_day">
                    @foreach($days as $day)
                        <option value="{{$day->id}}" {{$day->id == old('birth_day') ? 'selected' : ''}}>{{$day->id}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label> Marital Status </label>
        <select class="form-control" id="marital_status_id" name="marital_status_id">
            <option value="" disabled>Select Marital Status</option>
            @foreach($maritalStatus as $status)
                <option value="{{$status->id}}" {{$status->id == old('marital_status_id') ? 'selected' : ''}}>{{$status->marital_status}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="lastName">Do You Have Children?</label>
        <select class="form-control" id="any_child" name="any_child">
            <option value="" disabled>Select Children Status</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="lastName">No Of Children?</label>
        <select class="form-control" id="bd_children" name="bd_children">
            <option value="" disabled></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
        </select>
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

        /**************************************************/


        function showPageOthers(showdiv) {
            $(showdiv).show();
        }


        

    </script>

@endpush