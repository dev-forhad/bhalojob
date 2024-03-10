
<!-- for Japanese language skill -->
@php
$languageList = DB::table('languages')->get();
@endphp
{{--@foreach($languageList as $list)
  <div>
    <label class=" fw-bolder d-block input-label mb-1" for="japan-lan">{{$list->lang}} language skill</label>
    <select class="input-box input-text-color" name="language_type_id" id="language_type_id_{{$list->id}}">
      
    </select>
  </div>
  @endforeach--}}

   <!--for Japanese language skill -->
    
    <form class="form" id="add_edit_profile_language2" method="POST" action="{{ route('store.lang', [$user->id]) }}">
       @csrf
  <div class="lang_main_div" style="display:none">
    <label class=" fw-bolder d-block input-label mb-1" for="english-lan"><span id="lang_name"></span> language skill</label>
    <select class="input-box input-text-color" name="lang_type_id" id="language_type_id">
      
    </select>
    <div id="submit">
        <input type="hidden" name="lang_id" class="lang_id">
        <button type="button" class="btn btn-large btn-primary mt-3" onClick="submitProfileLanguage();">{{__('Submit')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
    </div>
  </div>
  </form>
<div class="row">

    <div class="col-md-12">

        <div class="" id="language_div"></div>

    </div>

</div>

<a href="javascript:;" class="prolinkadd" onclick="showProfileLanguageModal();"><i class="fas fa-plus" aria-hidden="true"></i> {{__('Add Language')}} </a>

<!--<hr>-->

<div class="modal" id="add_language_modal" role="dialog"></div>

@push('scripts')
    
    <script type="text/javascript">
        $(document).on('click', '.selectlang', function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            getLanguageInfoData(id, name);
        });

        /**************************************************/

        function showProfileLanguageModal() {

            $("#add_language_modal").modal();

            loadProfileLanguageForm();

        }
        
        




        function loadProfileLanguageForm() {

            $.ajax({

                type: "POST",

                url: "{{ route('get.front.profile.language.form', $user->id) }}",

                data: {"_token": "{{ csrf_token() }}"},

                datatype: 'json',

                success: function (json) {

                    $("#add_language_modal").html(json.html);

                }

            });

        }

        function showProfileLanguageEditModal(profile_language_id) {

            $("#add_language_modal").modal();

            loadProfileLanguageEditForm(profile_language_id);

        }

        function loadProfileLanguageEditForm(profile_language_id) {

            $.ajax({

                type: "POST",

                url: "{{ route('get.front.profile.language.edit.form', $user->id) }}",

                data: {"profile_language_id": profile_language_id, "_token": "{{ csrf_token() }}"},

                datatype: 'json',

                success: function (json) {

                    $("#add_language_modal").html(json.html);

                }

            });

        }
        function getLanguageInfoedit(language_id){
            $.ajax({
                type: "POST",
                url: "{{ route('getlanguage.type') }}",
                data: {"type_id": language_id, "_token": "{{ csrf_token() }}"},
                datatype: 'json',
                success: function (data) {
                    // if(name == 'en'){
                        // var jalanguageType = $('#language_type_id_').empty();
                        // var languageType = $('#language_type_id_'+language_id).empty();
                       
                        var languageType = $('.language_level_edit').empty();
                        
                        $.each(data.languageinfos, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .language_level +
                                '</option>');
                        });
                }
            });
        }
      function getLanguageInfoData(language_id, name){
          $('[id^="language_type_id_"]').empty();
           $.ajax({
                type: "POST",
                url: "{{ route('getlanguage.type') }}",
                data: {"type_id": language_id, "_token": "{{ csrf_token() }}"},
                datatype: 'json',
                success: function (data) {
                    // if(name == 'en'){
                        // var jalanguageType = $('#language_type_id_').empty();
                        // var languageType = $('#language_type_id_'+language_id).empty();
                        $('.lang_main_div').show();
                        var languageType = $('#language_type_id').empty();
                        $('#lang_name').html(name);
                        $('.lang_id').val(language_id);
                        $.each(data.languageinfos, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .language_level +
                                '</option>');
                        });

                    // }else{

                    //     // var enlanguageType = $('#language_type_id_en').empty();
                    //     var languageType = $('#language_type_id_'+name).empty();
                    //     $.each(data.languageinfos, function (create, subcatObj) {
                    //         var option = $('<option/>', {
                    //             id: create,
                    //             value: subcatObj
                    //         });
                    //         languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                    //                 .eng_title +
                    //             '</option>');
                    //     });

                    // }
                    $('#add_language_modal').modal('hide');
                }
            });
      }


        function getLanguageInfo(language_id,typeId) {

            $.ajax({
                type: "POST",
                url: "{{ route('update.front.profile.language.type', $user->id) }}",
                data: {"type_id": language_id,"language_level_type_id": typeId, "_token": "{{ csrf_token() }}"},
                datatype: 'json',
                success: function (data) {
                  
                    if(typeId == 1){

                        var languageType = $('#language_type_id').empty();
                        $.each(data.languageinfos, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .eng_title +
                                '</option>');
                        });

                    }else{


                        var languageType = $('#language_level_id').empty();
                        $.each(data.languageinfos, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .language_level +
                                '</option>');
                        });

                    }





                }
            });
        }

       function submitProfileLanguage(){
           var form = $('#add_edit_profile_language2');
           $.ajax({

                url: form.attr('action'),

                type: form.attr('method'),

                data: form.serialize(),

                dataType: 'json',

                success: function (json) {
                    console.log(json)
                    // $('#add_language_modal').modal('show');
                    // $("#add_language_modal").html(json.html);
                    $('.lang_main_div').hide();
                    form[0].reset();
                    Swal.fire({
                        position: 'center',
                        // icon: 'success',
                        title: 'Language added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    

                    showLanguages();

                },error: function (json) {
                    alert('Incorrect credentials. Please try again.')
                }
           });
           
       }
        
        function submitProfileLanguageForm() {

            var form = $('#add_edit_profile_language');

            $.ajax({

                url: form.attr('action'),

                type: form.attr('method'),

                data: form.serialize(),

                dataType: 'json',

                success: function (json) {
                    console.log(json)
                    $("#add_language_modal").html(json.html);
                    
                    showLanguages();

                },

                error: function (json) {

                    if (json.status === 422) {

                        var resJSON = json.responseJSON;

                        $('.help-block').html('');

                        $.each(resJSON.errors, function (key, value) {

                            $('.' + key + '-error').html('<strong>' + value + '</strong>');

                            $('#div_' + key).addClass('has-error');

                        });

                    } else {

                        // Error

                        // Incorrect credentials

                        // alert('Incorrect credentials. Please try again.')

                    }

                }

            });

        }

        function delete_profile_language(id) {

            var msg = "{{__('Are you sure! you want to delete?')}}";

            if (confirm(msg)) {

                $.post("{{ route('delete.front.profile.language') }}", {
                    id: id,
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                })

                    .done(function (response) {

                        if (response.trim() == "ok"){
                            Swal.fire({
                                position: 'center',
                                title: 'Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#language_' + id).remove();

                        } else {

                            alert('Request Failed!');

                        }

                    });

            }

        }

        $(document).ready(function () {

            showLanguages();

        });

        function showLanguages() {

            $.post("{{ route('show.front.profile.languages', $user->id) }}", {
                user_id: {{$user->id}},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })

                .done(function (response) {

                    $('#language_div').html(response);
                    

                });

        }

    </script>

@endpush