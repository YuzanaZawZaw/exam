@extends('userlayout')
@section('usercontent')
<div class="container">
        <h1 class="text-center">Report</h1>
        @foreach($reports as $report)
        <h5 class="text-center">for {{ $report->exam_name }}</h5>
        <hr>
        <p>
            User name: 
            <b>
                {{ $report->first_name }} {{ $report->last_name }}
            </b>
        </p>
        <br>
        <p>
            This user got a rating of
            <b>
            {{$report->percentage}} %
            </b>{{$report->total_mark}}/{{$report->sum}}
        </p>
        @endforeach
    </div>
@stop