<?php
$lang = config('default_lang');
if (isset($languageLevel))
    $lang = $languageLevel->lang_id;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">        
    {!! Form::hidden('id', null) !!}
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}" id="lang_div">
        {!! Form::label('lang', 'Language', ['class' => 'bold']) !!}                    
        {!! Form::select('lang_id', ['' => 'Select Language']+$languages, $lang, array('class'=>'form-control', 'id'=>'lang')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'eng_title') !!}">
        {!! Form::label('eng_title', 'Language English Title', ['class' => 'bold']) !!}
        {!! Form::text('eng_title', null, array('class'=>'form-control', 'id'=>'eng_title', 'placeholder'=>'English Title')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'eng_title') !!}
    </div>
    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'jp_title') !!}" id="">
        {!! Form::label('jp_title', 'Japanesse Title', ['class' => 'bold']) !!}                    
        {!! Form::text('jp_title', null, array('class'=>'form-control', 'id'=>'jp_title', 'placeholder'=>'Japanese Title')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'jp_title') !!}                                       
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