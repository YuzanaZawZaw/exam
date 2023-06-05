<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Status;
use App\Models\Result;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\DB;
use Session;
class ExamController extends Controller
{
    
    function index(){
        return view('adminexam');
    }
    function createExam(Request $req){
        $exam=new Exam;
        $exam->user_id=$req->input('userId');
        $exam->exam_name=$req->input('examName');
        $exam->status_id=1;
        $exam->save();
        
        $examList = DB::table('exams')
                    ->join('statuses','exams.status_id','statuses.status_id')
                    ->select('exams.*', 'statuses.status_name')
                    ->where('exams.user_id', $req->session()->get('userId'))
                    ->get();
        
        $req->session()->flash('successMsg','Exam is successfully created');
        return view('adminexam',['data'=>$examList]);
    }
    function examList(Request $req){
        $examList = DB::table('exams')
                    ->join('statuses','exams.status_id','statuses.status_id')
                    ->select('exams.*', 'statuses.status_name')
                    ->where('exams.user_id', $req->session()->get('userId'))
                    ->get();
        return view('adminexam',['data'=>$examList]);
    }
    function deleteExam($exam_id,Request $req){
        DB::table('exams')
                        ->where('exam_id',$exam_id)
                        ->update(
                        ['status_id' => 2]);
        $req->session()->flash('successMsg','Exam is successfully deleted');
        return redirect('adminexam');
    }
    function firstLoadUpdateView($exam_id){
        $data = DB::table('exams')->where('exam_id', $exam_id)->get();
        $status = Status::all();
        session(['exam_id' => $exam_id]);
        return view('adminexamupdate',['data'=>$data,'status'=>$status]);
    }
    function updateExam(Request $req){
        DB::table('exams')
              ->where('exam_id',$req->input('examId'))
              ->update(
                ['exam_name'=>$req->input('examName'),
                'status_id'=>$req->input('updateStatusId'),
                'user_id'=>$req->input('userId')
                ]
                );
        $req->session()->flash('successMsg','Exam is successfully updated');
        return redirect('adminexam');
    }
    
    function firstLoadExamDetailsView($exam_id){
        session(['exam_id' => $exam_id]);
        $data = DB::table('exams')->join('statuses','exams.status_id','statuses.status_id')
                                    ->join('users','exams.user_id','users.user_id')
                                    ->select('exams.*', 'statuses.status_name','users.first_name','users.last_name')
                                    ->where('exams.exam_id', $exam_id)
                                    ->get();
        $questionData=DB::table('questions')->where('exam_id',$exam_id)->get();
        $examinees=DB::table('results')->join('users','results.user_id','users.user_id')
                                        ->select('results.*', 'users.first_name','users.last_name','users.email')
                                        ->where('exam_id',$exam_id)->get();
        return view('adminexamdetails',['data'=>$data,'questionData'=>$questionData,'examinees'=>$examinees]);
    }

    function allExamList(Request $req){
        $examList = DB::table('exams')
                    ->join('statuses','exams.status_id','statuses.status_id')
                    ->select('exams.*', 'statuses.status_name')->where('exams.status_id','1')
                    ->get();
        return view('userexam',['data'=>$examList]);
    }

    function viewExamByUser($exam_id){
        session(['exam_id' => $exam_id]);
        $data = DB::table('exams')->join('statuses','exams.status_id','statuses.status_id')
                                    ->join('users','exams.user_id','users.user_id')
                                    ->select('exams.*', 'statuses.status_name','users.first_name','users.last_name')
                                    ->where('exams.exam_id', $exam_id)
                                    ->get();

        $questionData=DB::table('questions')->where('exam_id',$exam_id)->get();
        $choices=DB::table('multiple_choices')->join('questions','multiple_choices.question_id','questions.question_id')
                            ->join('statuses','multiple_choices.status_id','statuses.status_id')
                            ->select('multiple_choices.*', 'statuses.status_name')
                            ->get();
        return view('userexamdetails',['data'=>$data,'questionData'=>$questionData,'choices'=>$choices]);
    }

    function takeExam(Request $req){
        $question_ids = $req->input('question_id');
        $answers = $req->input('answer');
        $userId = $req->session()->get('userId');
        $examId=$req->session()->get('exam_id');

        $check_exisiting = UserAnswer::where('user_id', $userId)->where('exam_id',$examId)->count();
        if ($check_exisiting > 0){
            $req->session()->flash('errorMsg','You already took the quiz');
            return $this->viewExamByUser($examId);
        }

        $questionData=DB::table('questions')->where('exam_id',$examId)->get();
        $choices=DB::table('multiple_choices')->join('questions','multiple_choices.question_id','questions.question_id')
                            ->join('statuses','multiple_choices.status_id','statuses.status_id')
                            ->select('multiple_choices.*', 'statuses.status_name')
                            ->get();
        $sum=0;
        foreach($questionData as $question)  {
            $sum+=$question->points;
            foreach($choices as $choice){
                if($question->question_id==$choice->multiple_choice_id){
                    $userAnswer=new UserAnswer;
                    $userAnswer->user_id=$userId;
                    $userAnswer->exam_id=$examId;
                    $userAnswer->question_id=$question_ids[$question->question_id];
                    $userAnswer->answer=$answers[$choice->multiple_choice_id];
                    $userAnswer->save();
                }
            }
        }

        $userAnswers = DB::table('user_answers')
                        ->join('exams','user_answers.exam_id','exams.exam_id')
                        ->join('questions','user_answers.question_id','questions.question_id')
                        ->join('multiple_choices','user_answers.question_id','multiple_choices.question_id')
                        ->where('user_answers.user_id', $userId)
                        ->where('exams.exam_id',$examId)
                        ->where('multiple_choices.status_id',1)
                        ->get();

        $totalMarks = 0;
        foreach($userAnswers as $answer){
            if($answer->answer == $answer->multiple_choice_id)
                $totalMarks += $answer->points;
        }

        $result=new Result;
        $result->exam_id=$examId;
        $result->user_id=$userId;
        $result->total_mark=$totalMarks;
        $result->sum=$sum;

        $ave = $totalMarks / $sum;
        $percentage=number_format($ave, 2) * 100;

        $result->percentage=$percentage;
        $result->save();
        
        $reports=DB::table('results')->join('users','results.user_id','users.user_id')
                                    ->join('exams','results.exam_id','exams.exam_id')
                                    ->select('results.sum','results.total_mark',
                                    'results.percentage','users.first_name',
                                    'users.last_name','exams.exam_name')
                                    ->where('users.user_id',$userId)
                                    ->get();
                                   
        return view('result',['reports'=>$reports]);
    }
}