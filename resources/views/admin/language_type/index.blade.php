@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td, .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }	
</style>
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <a href="{{ route('admin.home') }}">Home</a> <i class="fa fa-circle"></i> </li>
                <li> <span>Language Types</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Language Types <small>Language Types</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Language Types</span> </div>
                        <div class="actions"> <a href="{{ route('create.language.types') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Add New Language Type</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="languageLevel-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="languageLevelDatatableAjax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <td>{!! Form::select('lang_id', ['' => 'Select Language']+$languages, config('default_lang'), array('id'=>'lang', 'class'=>'form-control')) !!}</td>
                                            <td><input type="text" class="form-control" name="eng_title" id="eng_title" autocomplete="off" placeholder="En Title"></td>
                                            <td><input type="text" class="form-control" name="jp_title" id="jp_title" autocomplete="off" placeholder="Jp Title"></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>Language</th>
                                            <th>Enlish Type</th>
                                            <th>Japaness Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY --> 
</div>
@endsection
@push('scripts') 
<script>
    $(function () {
        var oTable = $('#languageLevelDatatableAjax').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            searching: false,
            /*		
             "order": [[1, "asc"]],            
             paging: true,
             info: true,
             */
            ajax: {
                url: '{!! route('fetch.data.language.types') !!}',
                data: function (d) {
                    d.lang = $('#lang_id').val();
                    d.language_level = $('#eng_title').val();
                    d.is_active = $('#jp_title').val();
                }
            }, columns: [
                {data: 'lang_id', name: 'lang_id'},
                {data: 'eng_title', name: 'eng_title'},
                {data: 'jp_title', name: 'jp_title'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#languageLevel-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#lang_id').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#eng_title').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#jp_title').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });
    function deleteLanguageLevel(id, is_default) {
        var msg = 'Are you sure?';
        if (is_default == 1) {
            msg = 'Are you sure? You are going to delete default Language Level, all other non default Language Types will be deleted too!';
        }
        if (confirm(msg)) {
            $.post("{{ route('delete.language.types') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response.trim() == "ok")
                        {
                            var table = $('#languageLevelDatatableAjax').DataTable();
                            table.row('languageLevelDtRow' + id).remove().draw(false);
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        }
    }
</script> 
@endpush