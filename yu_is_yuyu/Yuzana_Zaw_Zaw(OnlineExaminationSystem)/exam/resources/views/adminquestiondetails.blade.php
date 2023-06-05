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
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            @if(Session::get('exam_id'))
                <li class="breadcrumb-item"><a href="/detailsExam/{{Session::get('exam_id')}}">Back to exam profile</a>
                </li>
            @endif
            <li class="breadcrumb-item active" aria-current="page">Question profile</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3 align="center">
                <font color="#836ea7">Question Profile</font>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            @foreach($data as $item)
            <div>
                Question:<br>
                <strong>{{$item->question_name}}</strong>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
<div class="container-xl mt-5">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h2>
                            <font color="#836ea7">Multiple choices</font>
                        </h2>
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <div class="col-md-2">
                        <nav id="navbar" class="navbar">
                            <a class="btn btn-outline-info" href="#addChoicesModal" data-bs-toggle="modal">New</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="p-3 table-responsive">
                <table class="table table-striped table-hover table-bordered" id="myTable">
                    <thead style="background-color: #836ea7; color: white">
                        <tr>
                            <th>Choice name</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($choices as $choiceItem)
                        <tr>
                            <td>{{$choiceItem->choice_name}}</td>
                            <td>{{$choiceItem->status_name}}</td>
                            <td>{{$choiceItem->created_at}}</td>
                            <td>{{$choiceItem->updated_at}}</td>
                            <td>
                                <a href="/detailsExam/detailsQuestion/deleteChoice/{{$choiceItem->multiple_choice_id}}"
                                    onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                <a href="/detailsExam/detailsQuestion/updateChoice/{{$choiceItem->multiple_choice_id}}"><i
                                        class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- Add Choices Modal HTML -->
<div class="modal fade" id="addChoicesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h2 class="modal-title text-white">Add a new multiple choice</h2>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="/detailsExam/detailsQuestion/adminChoices" method="POST">
                    @csrf
                    <div class="form-group first">
                        @if(Session::get('question_id'))
                        <input type="hidden" class="form-control" name="questionId" value="{{Session::get('question_id')}}" />
                        @endif
                    </div>
                    <div class="text-white">
                        <label class="form-label">Choice Name</label>
                        <textarea type="text" class="form-control" name="choiceName"
                            placeholder="Enter a choice name.." rows="5" required></textarea>
                    </div>
                    <div class="form-group first">
                        <label class="form-label" for="statusId">Status:</label>
                        <select name="statusId" class="form-select" aria-label="Default select example" id="statusId" required>
                            <option selected>Open this select menu</option>
                            @foreach($statusList as $statusItem)
                            <option value="{{$statusItem->status_id}}">{{$statusItem['status_name']}}</option>
                            @endforeach
                        </select>
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
<!-- <script>
    if(jQuery('#statusId').val() == ''){ 
    alert('Please select the option for status'); 
    }else{ 
    return false; 
    }
</script> -->
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