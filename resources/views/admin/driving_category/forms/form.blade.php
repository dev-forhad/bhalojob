<?php
$lang = config('default_lang');
if (isset($languageLevel))
    $lang = $languageLevel->lang_id;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
$class_id = (isset($languageLevel) ? $languageLevel->class_id : null);
        
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}" id="lang_div">
        
        {!! Form::label('class_id', 'Class Name', ['class' => 'bold']) !!}                    
        {!! Form::select('class_id', ['' => 'Select Class']+$languages, @$class_id, array('class'=>'form-control', 'id'=>'lang')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'eng_title') !!}">
        {!! Form::label('eng_title', 'Category Name', ['class' => 'bold']) !!}
        {!! Form::text('eng_title', null, array('class'=>'form-control', 'id'=>'eng_title', 'placeholder'=>'English Title')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'eng_title') !!}
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