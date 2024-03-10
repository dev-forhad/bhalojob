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
                <li> <span>Driving class</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR --> 
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Manage Driving <small>Class</small> </h3>
        <!-- END PAGE TITLE--> 
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12"> 
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Driving</span> </div>
                        <div class="actions"> <a href="{{ route('create.drivingclass') }}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Add New Driving class</a> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="language-search-form">
                                <table class="table table-striped table-bordered table-hover"  id="languageDatatableAjax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <td><input type="text" class="form-control" name="class_name" id="class_name" autocomplete="off" placeholder="Class Name"></td>
                                            <td><select name="is_active" id="is_active"  class="form-control">
                                                    <option value="-1">Is Active?</option>
                                                    <option value="1" selected="selected">Active</option>
                                                    <option value="0">In Active</option>
                                                </select></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>Class Name</th>
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
        var oTable = $('#languageDatatableAjax').DataTable({
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
                url: '{!! route('fetch.data.drivingclass') !!}',
                data: function (d) {
                    d.class_name = $('#class_name').val();
                    d.is_active = $('#is_active').val();
                }
            }, columns: [
                {data: 'class_name', name: 'class_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('#language-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#class_name').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#is_active').on('change', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });
    function deleteLanguage(id, is_default) {
        var msg = 'Are you sure?';
        if (is_default != 1) {
            if (confirm(msg)) {
                $.post("{{ route('delete.drivingclass') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                        .done(function (response) {
                            if (response.trim() == 'ok')
                            {
                                var table = $('#languageDatatableAjax').DataTable();
                                table.row('languageDtRow' + id).remove().draw(false);
                            } else
                            {
                                alert('Request Failed!');
                            }
                        });
            }
        } else {
            alert('You can not delete default Language');
        }
    }
    function makeActive(id) {
        $.post("{{ route('make.active.drivingclass') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response.trim() == 'ok')
                    {
                        var table = $('#languageDatatableAjax').DataTable();
                        table.row('languageDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
    function makeNotActive(id) {
        $.post("{{ route('make.not.active.drivingclass') }}", {id: id, _method: 'PUT', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                    if (response.trim() == 'ok')
                    {
                        var table = $('#languageDatatableAjax').DataTable();
                        table.row('languageDtRow' + id).remove().draw(false);
                    } else
                    {
                        alert('Request Failed!');
                    }
                });
    }
</script> 
@endpush