<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_education" method="POST" action="{{ route('store.profile.education', [$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="btn dark btn-outline close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Education</h4>
            </div>
            @include('user.forms.education.education_inc.education_form')
            <div class="modal-footer">
                
                 <button type="button" class="btn dark btn-outline close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="btn btn-large btn-primary" onClick="submitProfileEducationForm();">Add Education <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->