<div class="modal-dialog modal-md">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_language" method="POST" action="{{ route('store.front.profile.language', [$user->id]) }}">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">{{__('Add Language')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            @include('candidate.language.language_form')
            <!--<div class="modal-footer">-->
            <!--    <button type="button" class="btn btn-large btn-primary" onClick="submitProfileLanguageForm();">{{__('Add Language')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>-->
            <!--</div>-->
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->