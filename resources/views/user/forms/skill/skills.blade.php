@php
        $years = DB::table('years')->get();
        $months = DB::table('months')->get();
    $listoflisene = DB::table('driving_classes')->get();
    @endphp
    
<form class="form" id="add_edit_profile_skillform" method="POST" action="{{ route('store.front.profile.skill', [$user->id]) }}">
       @csrf
  <div class="lang_div" style="display:none">
    <label class=" fw-bolder d-block input-label mb-1" for="english-lan"><span id="cert_name"></span> language</label>
        <select class="input-box input-text-color" name="lang_type_id" id="certificate_language_type_id" required>
          
        </select>
    
    <div class="custom-flex py-2">
        <select class="input-box deep-placeholder mr-4" name="pass_year" id="year" required>
          <option value>Select year</option>
           @foreach($years as $year)
            <option value="{{$year->id}}">{{$year->year_value}}</option>
            @endforeach
        </select>

        <select class="input-box deep-placeholder ms-4" name="pass_month" id="month" required>
          <option value>Select month</option>
            @foreach($months as $month)
                <option value="{{$month->id}}">{{$month->eng_title}}</option>
            @endforeach
        </select>
    </div>
  </div>
  <div class="license_div" style="display:none">
      <div class="row py-2">
          <div class="col-md-6">
              <label class=" fw-bolder d-block input-label mb-1" for="english-lan"><span id="license_name"></span></label>
                <select class="input-box deep-placeholder select_driving_class mr-4" name="driving_class_id" id="driving_class_id" required>
                    @foreach($listoflisene as $linces)
                    <option value="{{$linces->id}}">{{$linces->class_name}}</option>
                    @endforeach
                </select>
          </div>
          <div class="col-md-6">
              <label class=" fw-bolder d-block input-label mb-1" for="english-lan">&nbsp;</label>
              <select class="input-box deep-placeholder ms-4" name="driving_cat_id" id="driving_cat_id" required>
                </select>
          </div>
          
      </div>
     <div class="custom-flex py-2">
        <select class="input-box deep-placeholder mr-4" name="driving_pass_year" id="year" required>
          <option value>Select Driving Expiry Year</option>
           @foreach($years as $year)
            <option value="{{$year->id}}">{{$year->year_value}}</option>
            @endforeach
        </select>

        <select class="input-box deep-placeholder ms-4" name="driving_pass_month" id="month" required>
          <option value>Select Driving Expiry month</option>
            @foreach($months as $month)
                <option value="{{$month->id}}">{{$month->eng_title}}</option>
            @endforeach
        </select>
    </div>
  </div>
  <div id="skill_submit" style="display:none">
        <input type="hidden" name="skill_lang_id" class="skill_lang_id">
        <input type="hidden" name="type">
        <button type="button" class="btn btn-large btn-primary mt-3" onClick="submitProfileSkillForm();">{{__('Submit')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
    </div>
</form>
<div class="row">

    <div class="col-md-12">

        <div class="" id="skill_div"></div>

    </div>

</div>

<a href="javascript:;" class="prolinkadd" onclick="showProfileSkillModal();"><i class="fas fa-plus" aria-hidden="true"></i> {{__('Add Certification')}} </a>

<hr>

<div class="modal" id="add_skill_modal" role="dialog"></div>

@push('scripts')

    <script type="text/javascript">
     $('.lang_div').hide();
     $('.license_div').hide();
     $('#skill_submit').hide();
        $(document).on('click', '.selectlang', function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            $('.license_div').hide();
            getLanguageTypeData(id, name);
            $('#driving_class_id').empty();
            $('#driving_cat_id').empty();
            $('#skill_submit').show();
            $('input[name="type"]').val('lang');
        });
        $(document).on('click', '.selectlicense', function(){
            var name= $(this).data('name');
            $('.license_div').show();
            $('.lang_div').hide();
            $('#certificate_language_type_id').empty();
         
            $('.skill_lang_id').val('');
            $('#skill_submit').show();
            $('#license_name').html(name);
            $('#add_skill_modal').modal('hide');
            $('input[name="type"]').val('licencse');
            load_driving_class_data();
            
        });
        $(document).on('click', '.select_driving_class', function(e){
            e.preventDefault();
            filtercategory(0);
        });
         $(document).on('click', '.select_driving_class_edit', function(e){
            e.preventDefault();
            filtercategory2(0);
        });
        
        function filtercategory(class_id) {
            var class_id = $('#driving_class_id').val();
            if (class_id != '') {
                $.post("{{ route('filter.driving.category.dropdown.bd') }}", {
                    class_id: class_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {
                        var languageType = $('#driving_cat_id').empty();
                         $.each(response.category_info, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .eng_title +
                                '</option>');
                        });
                        // $('#driving_cat_id').html(response);
                    });
            }
        }
        function filtercategory2(class_id) {
            var class_id = $('#driving_class_id_edit').val();
            if (class_id != '') {
                $.post("{{ route('filter.driving.category.dropdown.bd') }}", {
                    class_id: class_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })
                    .done(function (response) {
                        var languageType = $('#driving_cat_id_edit').empty();
                         $.each(response.category_info, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .eng_title +
                                '</option>');
                        });
                        // $('#driving_cat_id').html(response);
                    });
            }
        }
       function getLanguageTypeData(language_id, name){
           $.ajax({
                type: "POST",
                url: "{{ route('getcertificate.type') }}",
                data: {"type_id": language_id, "_token": "{{ csrf_token() }}"},
                datatype: 'json',
                success: function (data) {
                   
                        $('.lang_div').show();
                        var languageType = $('#certificate_language_type_id').empty();
                        $('#cert_name').html(name);
                        $('.skill_lang_id').val(language_id);
                        $.each(data.languageinfos, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            languageType.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .eng_title +
                                '</option>');
                        });

                   
                    $('#add_skill_modal').modal('hide');
                }
            });
      }
      function load_driving_class_data(){
          $.ajax({
                type: "POST",
                url: "{{ route('fetchdriving.class') }}",
                data: {"_token": "{{ csrf_token() }}"},
                datatype: 'json',
                success: function (data) {
                    var classid = $('#driving_class_id').empty();
                    $('#driving_cat_id').empty();
                        $.each(data.listoflisene, function (create, subcatObj) {
                            var option = $('<option/>', {
                                id: create,
                                value: subcatObj
                            });
                            
                            classid.append('<option  value ="' + subcatObj.id + '">' + subcatObj
                                    .class_name +
                                '</option>');
                        });

                }
            });
      }
        
        /**************************************************/

        function showProfileSkillModal() {

            $("#add_skill_modal").modal();

            loadProfileSkillForm();

        }

        function loadProfileSkillForm() {

            $.ajax({

                type: "POST",

                url: "{{ route('get.front.profile.skill.form', $user->id) }}",

                data: {"_token": "{{ csrf_token() }}"},

                datatype: 'json',

                success: function (json) {

                    $("#add_skill_modal").html(json.html);

                }

            });

        }

        function showProfileSkillEditModal(skill_id, type) {

            $("#add_skill_modal").modal();

            loadProfileSkillEditForm(skill_id, type);

        }

        function loadProfileSkillEditForm(skill_id, type) {

            $.ajax({

                type: "POST",

                url: "{{ route('get.front.profile.skill.edit.form-new', $user->id) }}",

                data: {"skill_id": skill_id, "type": type, "_token": "{{ csrf_token() }}"},

                datatype: 'json',

                success: function (json) {

                    $("#add_skill_modal").html(json.html);

                }

            });

        }

        function submitProfileSkillForm() {

            var form = $('#add_edit_profile_skillform');

            $.ajax({

                url: form.attr('action'),

                type: form.attr('method'),

                data: form.serialize(),

                dataType: 'json',

                success: function (json) {
                   // console.log(json);
                    $('#add_skill_modal').modal('show');
                    $("#add_skill_modal").html(json.html);
                    form[0].reset();
                    $('.license_div').hide();
                    $('.lang_div').hide();
                    $('#skill_submit').hide();
                    showSkills();

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
                        // alert('error')

                        // Error

                        // Incorrect credentials

                        // alert('Incorrect credentials. Please try again.')

                    }

                }

            });

        }
        function submitProfileeditSkillForm() {

            var form = $('#add_edit_profile_skill');

            $.ajax({

                url: form.attr('action'),

                type: form.attr('method'),

                data: form.serialize(),

                dataType: 'json',

                success: function (json) {
                   // console.log(json);
                    $('#add_skill_modal').modal('show');
                    $("#add_skill_modal").html(json.html);
                    form[0].reset();
                    $('.license_div').hide();
                    $('.lang_div').hide();
                    $('#skill_submit').hide();
                    showSkills();

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
                        // alert('error')

                        // Error

                        // Incorrect credentials

                        // alert('Incorrect credentials. Please try again.')

                    }

                }

            });

        }

        function delete_profile_skill(id) {

            var msg = "{{__('Are you sure! you want to delete?')}}";

            if (confirm(msg)) {

                $.post("{{ route('delete.front.profile.skill') }}", {
                    id: id,
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                })

                    .done(function (response) {

                        if (response.trim() == 'ok') {

                            $('#skill_' + id).remove();

                        } else {

                            alert('Request Failed!');

                        }

                    });

            }

        }

        $(document).ready(function () {

            showSkills();

        });

        function showSkills() {

            $.post("{{ route('show.front.profile.skills', $user->id) }}", {
                user_id: {{$user->id}},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })

                .done(function (response) {

                    $('#skill_div').html(response);

                });

        }

    </script>

@endpush