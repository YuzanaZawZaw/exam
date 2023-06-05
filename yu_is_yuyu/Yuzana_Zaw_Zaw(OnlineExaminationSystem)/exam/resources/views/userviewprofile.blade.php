@extends('userlayout')
@section('usercontent')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
        <h3 align="center">
                <font color="#836ea7">Profile</font>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
        @foreach($users as $user)
            <div>
                <strong>Name:</strong>
                {{$user->first_name}} {{$user->last_name}}
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
                            <font color="#836ea7">Taken exam lists</font>
                        </h3>
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
            <div class="p-3 table-responsive">
                <table class="table table-striped table-hover table-bordered" id="resultTable">
                    <thead style="background-color: #836ea7; color: white">
                        <tr>
                            <th>Exam name</th>
                            <th>Total marks(%) (score/total)</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td>{{$result->exam_name}}</td>
                            <td>{{$result->percentage}}% ({{ $result->total_mark }}/{{$result->sum}})</td>
                            <td>{{$result->created_at}}</td>
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
    $('#resultTable').DataTable({
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