<div class="modal-body">
    <div class="form-body">
        @php
            $years = DB::table('years')->get();
            $months = DB::table('months')->get();
            $days = DB::table('days')->get();
            $languageList = DB::table('languages')->get();
        @endphp




        <div class="row justify-content-center">

            <div class="form-group col-md-12">
                <div class="formrow text-center" id="div_language_id">
                    <label for="" class="mb-2"> Select language  </label>
                    <?php
                    $language_id = (isset($profileLanguage) ? $profileLanguage->language_id : null);
                    ?>
                    <div>
                    @foreach($languageList as $language)
                        <a data-id="{{$language->id}}" data-name="{{ucwords($language->lang)}}" class="d-block my-4 text center selectlang">{{$language->lang}}</a>
                        <!--<button onchange="getLanguageInfo(this.value,1)">{{$language->lang}}</button>-->
                    @endforeach
                    </div>
                    <!--<select class="form-control" id="language_id" onchange="getLanguageInfo(this.value,1)" name="language_id">-->
                    <!--    <option>Select language</option>-->
                    <!--        @foreach($languageList as $language)-->
                    <!--            <option  value="{{$language->id}}">{{$language->lang}}</option>-->
                    <!--        @endforeach-->
                    <!--</select>-->
                    <!--<span class="help-block language_id-error"></span>-->
                    </div>
            </div>
            {{--<div class="form-group col-md-6">
                <div class="formrow" id="">
                    <label for=""> Select Type </label>
                    <?php
                    $language_id3 = (isset($profileLanguage) ? $profileLanguage->language_id : null);
                    ?>
                    <select class="form-control" id="language_type_id" onchange="getLanguageInfo(this.value,2)" name="language_type_id">
                          
                    </select>
                    <!-- {!! Form::select('language_id', [''=>__('Select language')]+$languages, $language_id, array('class'=>'form-control ', 'id'=>'language_id')) !!} -->
                    <span class="help-block language_id-error"></span></div>
            </div>
            <div class="form-group col-md-6">
                <div class="formrow" id="div_language_level_id">
                    <label for=""> Select Language Level </label>
                    <?php
                    $language_level_id = (isset($profileLanguage) ? $profileLanguage->language_level_id : null);
                    ?>
                    <select class="form-control" class='form-control' id='language_level_id'>
                        @foreach($languageinfos as $info)
                        <option id="{{info->id}}">{{$info->language_level}}</option>
                        @endforeach
                    </select>
                    <!--{!! Form::select('language_level_id', [''=>__('Select Language Level')]+$languageLevels, $language_level_id, array('class'=>'form-control', 'id'=>'language_level_id')) !!}-->
                    <span class="help-block language_level_id-error"></span></div>
            </div>--}}

        </div>
    </div>
</div>



