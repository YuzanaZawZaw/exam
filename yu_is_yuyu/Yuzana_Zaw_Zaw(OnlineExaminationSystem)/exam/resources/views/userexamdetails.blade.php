@extends('userlayout')
@section('usercontent')

@if(Session::get('errorMsg'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{Session::get('errorMsg')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container mb-5 mt-5">
    @foreach($data as $item)
    <h3>{{$item->exam_name}}</h3>
    @endforeach
    @if(Session::get('exam_id'))
    
    <form action="/userexam/viewExam/{{Session::get('exam_id')}}/takeExam" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                @foreach($questionData as $index => $question)
                <p class="fw-bold">{{$index+1}}. {{$question->question_name}}</p>
                <input type="hidden" name="question_id[{{ $question->question_id }}]" value="{{ $question->question_id }}">
                
                <div>
                    @foreach($choices as $choice)
                    @if($choice->question_id==$question->question_id)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer[{{ $question->question_id }}]"
                            value="{{ $choice->multiple_choice_id }}" id="flexRadioDefault1" />
                        <label class="form-check-label" for="flexRadioDefault2">{{$choice->choice_name}}</label>
                    </div>
                    @endif
                    @endforeach
                </div>
                <hr>
                @endforeach
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-info px-4 py-2 fw-bold">
                        Submit</button>
                </div>
            </div>
        </div>
    </form>
    @endif
</div>
@stop