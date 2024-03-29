<div class="modal-dialog modal-lg">
    <div class="modal-content px-4">
        <form class="form" id="add_edit_profile_education" method="PUT" action="{{ route('update.front.profile.education', [$profileEducation->id,$user->id]) }}">{{ csrf_field() }}
        
            <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Edit Education')}}</h1>
        <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

            @include('user.forms.education.education_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="updateProfileEducationForm();">{{__('Update Education')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->