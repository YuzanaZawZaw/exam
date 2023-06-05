@extends('userlayout')
@section('usercontent')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
<div class="container-xl mt-5">
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
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->exam_name}}</td>                           
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>
                                <a href="/userexam/viewExam/{{$item->exam_id}}" class="btn btn-outline-info">Details</a>                         
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