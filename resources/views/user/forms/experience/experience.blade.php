<!--<h5 onclick="showExperience();">{{__('Experience')}}</h5>-->

<div class="row">

    <div class="col-md-12">

        <div class="" id="experience_div"></div>

    </div>

</div>

<a href="javascript:;" class="prolinkadd" onclick="showProfileExperienceModal();"><i class="fas fa-plus" aria-hidden="true"></i> {{__('Add Experience')}} </a>

<hr>

<div class="modal" id="add_experience_modal" role="dialog"></div>

@push('styles')

    <style type="text/css">

        .datepicker > div {

            display: block;

        }

    </style>

@endpush

@push('scripts')

    <script type="text/javascript">
        var errorFound = false; // Flag to track errors

        /**************************************************/
      
        $(document).ready(function(){
             if ($('#not_currently_working').prop('checked')) {
                $('#div_id_resign_year').show();
            }
            $(document).on('change', 'input[name="is_currently_working"]', function () {
                // Show or hide the div based on the selected radio button
                if ($(this).val() === '1') {
                    $('#div_id_resign_year').hide();
                } else {
                    $('#div_id_resign_year').show();
                }
            });
        });
        $(document).on('change','.ex_resign_year', function(e){
        // alert('not working');
        e.preventDefault();
         var id = parseInt($(this).val(), 10);  // Convert to integer
         var entry_year = parseInt($('.exp_entry_year').val(), 10);  // Convert to integer

        if(id < entry_year){
            $('#ex_pass_error').html('Resign Year is not Correct');
            errorFound = true;
        }else{
            $('#ex_pass_error').html('');
            errorFound = false;
        }
    
           
        });
    

        function showProfileExperienceModal() {

            $("#add_experience_modal").modal();

            loadProfileExperienceForm();

        }

        function loadProfileExperienceForm() {

            $.ajax({

                type: "POST",

                url: "{{ route('get.front.profile.experience.form', $user->id) }}",

                data: {"_token": "{{ csrf_token() }}"},

                datatype: 'json',

                success: function (json) {

                    $("#add_experience_modal").html(json.html);

                    // initdatepicker();

                    filterDefaultStatesExperience(0, 0);

                }

            });

        }

        function showProfileExperienceEditModal(profile_experience_id, state_id, city_id) {

            $("#add_experience_modal").modal();

            loadProfileExperienceEditForm(profile_experience_id, state_id, city_id);

        }

        function loadProfileExperienceEditForm(profile_experience_id, state_id, city_id) {

            $.ajax({

                type: "POST",

                url: "{{ route('get.front.profile.experience.edit.form', $user->id) }}",

                data: {"profile_experience_id": profile_experience_id, "_token": "{{ csrf_token() }}"},

                datatype: 'json',

                success: function (json) {

                    $("#add_experience_modal").html(json.html);

                    // initdatepicker();

                    filterDefaultStatesExperience(state_id, city_id);

                }

            });

        }

        function submitProfileExperienceForm() {
            var current_working_status = $('input[name="is_currently_working"]').val(); 
            if(current_working_status == 1){
                errorFound = false;
            }
            if (errorFound) {
                alert('Please Select Correct Resign Year.');
                return false;
            }else{

            var form = $('#add_edit_profile_experience');
           // alert(form.attr('action'))

            $.ajax({

                url: form.attr('action'),

                type: form.attr('method'),

                data: form.serialize(),

                dataType: 'json',

                success: function (json) {
                    console.log(json)
                     
                     if (json.status === 422) {
                         alert(json.is_currently_working);
                     }else if(json.status === 201){
                         $('#ex_pass_error').html('Resign Year is not Correct');
                
                     }else if(json.status === 202){
                         $('#ex_month_error').html('Resign Month is not Correct');
        
                     }
                     else{
                          $("#add_experience_modal").modal('hide');
                        Swal.fire({
                            position: 'center',
                            // icon: 'success',
                            title: 'Experience added successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
    
                        showExperience();
                     }
                    // $("#add_experience_modal").html(json.html);
                   

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

        }

        function delete_profile_experience(id) {

            var msg = "{{__('Are you sure! you want to delete?')}}";

            if (confirm(msg)) {

                $.post("{{ route('delete.front.profile.experience') }}", {
                    id: id,
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                })

                    .done(function (response) {

                        if (response.trim() == 'ok') {

                            $('#experience_' + id).remove();
                            Swal.fire({
                position: 'center',
                title: 'Info Deleted Successfully!',
                showConfirmButton: false,
                timer: 1500
            });


                        } else {

                            alert('Request Failed!');

                        }

                    });

            }

        }

        function initdatepicker() {

            $(".datepicker").datepicker({

                autoclose: true,

                format: 'yyyy-m-d'

            });

        }

        $(document).ready(function () {

            showExperience();

            initdatepicker();

            $(document).on('change', '#experience_country_id', function (e) {

                e.preventDefault();

                filterDefaultStatesExperience(0, 0);

            });

            $(document).on('change', '#experience_state_id', function (e) {

                e.preventDefault();

                filterDefaultCitiesExperience(0);

            });

        });

        function showExperience() {

            $.post("{{ route('show.front.profile.experience', $user->id) }}", {
                user_id: {{$user->id}},
                _method: 'POST',
                _token: '{{ csrf_token() }}'
            })

                .done(function (response) {

                    $('#experience_div').html(response);

                });

        }


        function filterDefaultStatesExperience(state_id, city_id) {

            var country_id = $('#experience_country_id').val();

            if (country_id != '') {

                $.post("{{ route('filter.lang.states.dropdown') }}", {
                    country_id: country_id,
                    state_id: state_id,
                    new_state_id: 'experience_state_id',
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })

                    .done(function (response) {

                        $('#default_state_experience_dd').html(response);

                        filterDefaultCitiesExperience(city_id);

                    });

            }

        }

        function filterDefaultCitiesExperience(city_id) {

            var state_id = $('#experience_state_id').val();

            if (state_id != '') {

                $.post("{{ route('filter.lang.cities.dropdown') }}", {
                    state_id: state_id,
                    city_id: city_id,
                    _method: 'POST',
                    _token: '{{ csrf_token() }}'
                })

                    .done(function (response) {

                        $('#default_city_experience_dd').html(response);

                    });

            }

        }

    </script>

@endpush