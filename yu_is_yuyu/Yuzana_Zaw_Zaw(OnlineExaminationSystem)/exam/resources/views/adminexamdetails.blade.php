@extends('adminlayout')
@section('admincontent')
@if(Session::get('successMsg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('successMsg')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
        <h3 align="center">
                <font color="#836ea7">Exam Profile</font>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
        @foreach($data as $item)
            <div>
                <strong>Exam Name:</strong>
                {{$item->exam_name}}
            </div>
            <div>
                <strong>Status:</strong> {{$item->status_name}}
            </div>
            <div>
                <strong>Created By:</strong>{{$item->first_name}} {{$item->last_name}}
            </div>
            @endforeach
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<div class="container-xl mt-5">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h3>
                            <font color="#836ea7">Examinee lists</font>
                        </h3>
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
            <div class="p-3 table-responsive">
                <table class="table table-striped table-hover table-bordered" id="examineeTable">
                    <thead style="background-color: #836ea7; color: white">
                        <tr>
                            <th>User name</th>
                            <th>Email</th>
                            <th>Total marks(%) (score/total)</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($examinees as $examinee)
                        <tr>
                            <td>{{$examinee->first_name}} {{$examinee->last_name}}</td>
                            <td>{{$examinee->email}}</td>
                            <td>{{$examinee->percentage}}% ({{ $examinee->total_mark }}/{{$examinee->sum}})</td>
                            <td>{{$examinee->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="container-xl mt-5">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h3>
                            <font color="#836ea7">Question lists</font>
                        </h3>
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <div class="col-md-2">
                        <nav id="navbar" class="navbar">
                            <a class="btn btn-outline-info" href="#addQuestionModal" data-bs-toggle="modal">New</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="p-3 table-responsive">
                <table class="table table-striped table-hover table-bordered" id="questionTable">
                    <thead style="background-color: #836ea7; color: white">
                        <tr>
                            <th>Question name</th>
                            <th>Points</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questionData as $questionItem)
                        <tr>
                            <td>{{$questionItem->question_name}}</td>
                            <td>{{$questionItem->points}}</td>
                            <td>{{$questionItem->created_at}}</td>
                            <td>{{$questionItem->updated_at}}</td>
                            <td>
                                <a href="/detailsExam/deleteQuestion/{{$questionItem->question_id}}"
                                    onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                <a href="updateQuestion/{{$questionItem->question_id}}"><i class="fa fa-edit"></i></a>
                                <a href="/detailsExam/detailsQuestion/{{$questionItem->question_id}}"><i
                                        class="fa fa-info-circle"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- Add Question Modal HTML -->
<div class="modal fade" id="addQuestionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h2 class="modal-title text-white">Add a question</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/detailsExam/adminQuestion" method="POST">
                    @csrf
                    <div class="form-group first">
                        @if(Session::get('exam_id'))
                        <input type="hidden" class="form-control" name="examId" value="{{Session::get('exam_id')}}" />
                        @endif
                    </div>
                    <div class="text-white">
                        <label class="form-label">Question Name</label>
                        <textarea type="text" class="form-control" name="questionName" placeholder="Enter a question.."
                            rows="5" required></textarea>
                    </div>
                    <div class="text-white">
                        <label class="form-label">Question Name</label>
                        <input type="number" class="form-control" name="points" placeholder="Enter the points.."/>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <input type="submit" name="btnSave" value="Save" class="btn btn-outline-info" />
                        <input type="submit" name="btnSaveCancel" value="Cancel" class="btn btn-outline-warning"
                            onclick="this.form.reset();" />
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {
    var dataSrc = [];
    $('#questionTable').DataTable({
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

<script>
$(document).ready(function() {
    var dataSrc = [];
    $('#examineeTable').DataTable({
        pagingType: 'full_numbers',
        scrollY: true,
        "lengthMenu": [5, 10, 25, 50, 75, 100],
        'initComplete': function() {
            var api = this.api();
            api.cells('tr', [0, 1,2]).every(function() {
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