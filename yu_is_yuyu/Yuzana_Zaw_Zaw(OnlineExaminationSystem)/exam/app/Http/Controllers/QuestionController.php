<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Status;
class QuestionController extends Controller
{
    //
    function index(){
        return view('adminexamdetails');
    }
    function createQuestion(Request $req){
        $exam_id = $req->input('examId');
        $question=new Question;
        $question->question_name=$req->input('questionName');
        $question->points=$req->input('points');
        $question->exam_id=$exam_id;
        $question->save();
        //getting the exam_id from session
        
        $data = DB::table('exams')->join('statuses','exams.status_id','statuses.status_id')
                                    ->join('users','exams.user_id','users.user_id')
                                    ->select('exams.*', 'statuses.status_name','users.first_name','users.last_name')
                                    ->where('exams.exam_id', $exam_id)
                                    ->get();
        $questionData=DB::table('questions')->where('exam_id',$exam_id)->get();

        $examinees=DB::table('results')->join('users','results.user_id','users.user_id')
                                        ->select('results.*', 'users.first_name','users.last_name','users.email')
                                        ->where('exam_id',$exam_id)->get();

        $req->session()->flash('successMsg','Question is successfully created');
        return view('adminexamdetails',['data'=>$data,'questionData'=>$questionData,'examinees'=>$examinees]);
    }

    function deleteQuestion($question_id){
        $question=DB::table('questions')->where('question_id',$question_id)->get();
        $exam_id=null;
        foreach($question as $item){
            $exam_id=$item->exam_id;
        }
        DB::table('questions')->where('question_id',$question_id)->delete();
        $data = DB::table('exams')->join('statuses','exams.status_id','statuses.status_id')
                                    ->join('users','exams.user_id','users.user_id')
                                    ->select('exams.*', 'statuses.status_name','users.first_name','users.last_name')
                                    ->where('exams.exam_id', $exam_id)
                                    ->get();
        $questionData=DB::table('questions')->where('exam_id',$exam_id)->get();
        session(['successMsg' => 'Question is successfully deleted']);
        return view('adminexamdetails',['data'=>$data,'questionData'=>$questionData]);
    }
    function firstLoadQuestionView($question_id){
        $data = DB::table('questions')->where('question_id', $question_id)->get();
        return view('adminquestionupdate',['data'=>$data]);
    }
    function updateQuestion(Request $req){
        $question=DB::table('questions')->where('question_id',$req->input('questionId'))->get();
        $exam_id=null;
        foreach($question as $item){
            $exam_id=$item->exam_id;
        }

        DB::table('questions')
              ->where('question_id',$req->input('questionId'))
              ->update(['question_name'=>$req->input('questionName'),
                        'points'=>$req->input('points')]);

        $data = DB::table('exams')->join('statuses','exams.status_id','statuses.status_id')
                ->join('users','exams.user_id','users.user_id')
                ->select('exams.*', 'statuses.status_name','users.first_name','users.last_name')
                ->where('exams.exam_id', $exam_id)
                ->get();
        $questionData=DB::table('questions')->where('exam_id',$exam_id)->get();
        
        session(['successMsg' => 'Exam is successfully updated']);
        return view('adminexamdetails',['data'=>$data,'questionData'=>$questionData]);
    }

    function firstLoadQuestionDetailsView($question_id){
        session(['question_id' => $question_id]);
        $data = DB::table('questions')->where('question_id', $question_id)->get();
        $choices=DB::table('multiple_choices')->join('questions','multiple_choices.question_id','questions.question_id')
                                    ->join('statuses','multiple_choices.status_id','statuses.status_id')
                                    ->select('multiple_choices.*', 'statuses.status_name')
                                    ->where('multiple_choices.question_id', $question_id)
                                    ->get();
        $status=Status::all();
        return view('adminquestiondetails',['data'=>$data,'choices'=>$choices,'statusList'=>$status]);
    }
}
