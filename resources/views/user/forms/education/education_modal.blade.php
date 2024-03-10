



<div class="modal-dialog modal-lg">
    <div class="modal-content px-4">
        <form class="form" id="add_edit_profile_education" method="POST" action="{{ route('store.front.profile.education', [$user->id]) }}">
            {{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{__('Add Education')}}</h4>
            </div>
            @include('user.forms.education.education_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileEducationForm();">{{__('Add Education')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->