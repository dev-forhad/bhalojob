<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_language" method="PUT" action="{{ route('update.front.profile.language', [$profileLanguage->id,$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
                <h4 class="modal-title">{{__('Edit Language')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
    <div class="form-body">
        @php
            $years = DB::table('years')->get();
            $months = DB::table('months')->get();
            $days = DB::table('days')->get();
            $languageList = DB::table('languages')->get();
        @endphp




        <div class="row justify-content-center">

           
            <div class="form-group col-md-6">
                <div class="formrow" id="">
                    <label for=""> Select Language </label>
                    <?php
                    $language_id = (isset($profileLanguage) ? $profileLanguage->language_id : null);
                    ?>
                    <select class="form-control edit_language_type" id="language_type_id" onchange="getLanguageInfoedit(this.value,2)" name="language_type_id">
                        @foreach($languageList as $language)
                        <option value="{{$language->id}}" {{$language->id == $language_id ? 'selected': '' }}>{{$language->lang}}</option>
                        @endforeach
                          
                    </select>
                    
                    <span class="help-block language_id-error"></span></div>
            </div>
            <div class="form-group col-md-6">
                <div class="formrow" id="">
                    <label for=""> Select Language Level </label>
                    <?php
                    $language_level_id = (isset($profileLanguage) ? $profileLanguage->language_level_id : null);
                    ?>
                    <select class='form-control language_level_edit' name="language_level_id" id='language_level_id'>
                        @foreach($languageInfo as $info)
                        <option value="{{$info->id}}" {{$info->id == $language_level_id ? 'selected': ''}}>{{$info->language_level}}</option>
                        @endforeach
                    </select>
                    <!--{!! Form::select('language_level_id', [''=>__('Select Language Level')]+$languageLevels, $language_level_id, array('class'=>'form-control', 'id'=>'language_level_id')) !!}-->
                    <span class="help-block language_level_id-error"></span></div>
            </div>

        </div>
    </div>
</div>




            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileLanguageForm();">{{__('Update Language')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->