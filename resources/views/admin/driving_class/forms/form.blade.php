<?php
$lang = 'en';
if (isset($language))
    $lang = $language->lang;
$lang = MiscHelper::getLang($lang);
$queryString = MiscHelper::getLangQueryStr();

?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'class_name') !!}">
        {!! Form::label('class_name', 'Language', ['class' => 'bold']) !!}
        {!! Form::text('class_name', null, array('class'=>'form-control', 'id'=>'class_name', 'placeholder'=>'Class Name')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'class_name') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Is Active?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($language)) ? $language->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" {{$is_active_1}}>
                Active </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" {{$is_active_2}}>
                In-Active </label>
        </div>			
        {!! APFrmErrHelp::showErrors($errors, 'is_active') !!}
    </div>
    	
    <div class="form-actions">
        {!! Form::button('Update <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!}
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
</script>
@endpush