@php $countries =  App\Helpers\DataArrayHelper::defaultCountriesArray(); @endphp
<div class="row">
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Where Do You Live</label>
        <div class="col-sm-10">
          <div class="col-md-6">
            <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id_bd') !!}">
                <label for="">{{__('Country')}}</label>
                <?php $country_id = old('country_id_bd'); ?>
               
                {!! Form::select('country_id_bd', [''=>__('Select Country')]+$countries, $country_id, array('class'=>'form-control required', 'id'=>'country_id_bd')) !!}
                {!! APFrmErrHelp::showErrors($errors, 'country_id_bd') !!} </div>
        </div>
        </div>
      </div>
</div>