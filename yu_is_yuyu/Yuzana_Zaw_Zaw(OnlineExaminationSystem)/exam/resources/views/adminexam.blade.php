@extends('adminlayout')
@section('admincontent')
@if(Session::get('successMsg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('successMsg')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<div class="container mt-5">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>
                        <font color="#836ea7">Create a new exam</font>
                    </h2>
                </div>
            </div>
            <div class="row gutters-sm mt-3">
                <div class="col-md-3 mb-3"></div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column">
                                <div class="mt-3">
                                    <form action="adminexam" method="POST">
                                        @csrf
                                        <div class="form-group first">
                                            @if(Session::get('userId'))
                                            <input type="hidden" class="form-control" name="userId"
                                                value="{{Session::get('userId')}}" />
                                            @endif
                                        </div>
                                        <div class="form-group first">
                                            <label class="form-label" for="examName">Exam name:</label>
                                            <input type="text" class="form-control" name="examName"
                                                placeholder="Enter exam name..." required />
                                        </div>
                                        <div class="text-center mt-3">
                                            <input type="submit" name="btnSave" value="Save"
                                                class="btn btn-outline-info" />
                                            <input type="submit" name="btnSaveCancel" value="Cancel"
                                                class="btn btn-outline-warning" onclick="this.form.reset();" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>
                            <font color="#836ea7">Exam List</font>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="p-3 table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead style="background-color: #836ea7; color: white">
                        <tr>
                            <th>Exam Name</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->exam_name}}</td>
                            <td>{{$item->status_name}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>
                                <a href="/deleteExam/{{$item->exam_id}}" onclick="return confirm('Are you sure?')"><i
                                        class="fa fa-trash"></i></a>
                                <a href="updateExam/{{$item->exam_id}}"><i class="fa fa-edit"></i></a>
                                <a href="/detailsExam/{{$item->exam_id}}"><i class="fa fa-info-circle"
                                        aria-hidden="true"></i>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
<script>
$(document).ready(function() {
    var dataSrc = [];
    $('#myTable').DataTable({
        pagingType: 'full_numbers',
        scrollY: true,
        "lengthMenu": [5, 10, 25, 50, 75, 100],
        'initComplete': function() {
            var api = this.api();
            api.cells('tr', [0, 1]).every(function() {
                // Get cell data as plain text
                var data = $('<div>').html(this.data()).text();
                if (dataSrc.indexOf(data) === -1) {
                    dataSrc.push(data);
                }
            });
            // Sort dataset alphabetically
            dataSrc.sort();

            // Initialize Typeahead plug-in
            $('.dataTables_filter input[type="search"]', api.table().container())
                .typeahead({
                    source: dataSrc,
                    afterSelect: function(value) {
                        api.search(value).draw();
                    }
                });
        }
    });
});
</script>
@stop