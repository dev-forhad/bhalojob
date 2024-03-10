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
                        <a data-id="{{$language->id}}" data-name="{{ucwords($language->lang)}}" class="d-block mb-4 text-center selectlang">{{$language->lang}}</a>
                    @endforeach
                        <a data-name="Driver License" class="d-block mb-4 text-center selectlicense">Driver License</a>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
</div>
