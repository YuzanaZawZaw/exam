<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultipleChoice;
use Illuminate\Support\Facades\DB;
use App\Models\Status;
class MultipleChoiceController extends Controller
{
    //
    function createChoice(Request $req){
        $multipleChoice=new MultipleChoice;
        $multipleChoice->choice_name=$req->input('choiceName');
        $multipleChoice->status_id=$req->input('statusId');
        $multipleChoice->question_id=$req->input('questionId');
        $multipleChoice->save();
        
        $req->session()->flash('successMsg','Multiple choice is successfully created');

        $data = DB::table('questions')->where('question_id', $req->input('questionId'))->get();
        $choices=DB::table('multiple_choices')->join('questions','multiple_choices.question_id','questions.question_id')
                                    ->join('statuses','multiple_choices.status_id','statuses.status_id')
                                    ->select('multiple_choices.*', 'statuses.status_name')
                                    ->where('multiple_choices.question_id', $req->input('questionId'))
                                    ->get();
        $status=Status::all();
        return view('adminquestiondetails',['data'=>$data,'choices'=>$choices,'statusList'=>$status]);
    }

    function deleteChoice(Request $req,$choice_id){
        DB::table('multiple_choices')->where('multiple_choice_id',$choice_id)->delete();
        $req->session()->flash('successMsg','Multiple choice is successfully deleted');

        $data = DB::table('questions')->where('question_id', $req->session()->get('question_id'))->get();
        $choices=DB::table('multiple_choices')->join('questions','multiple_choices.question_id','questions.question_id')
                                    ->join('statuses','multiple_choices.status_id','statuses.status_id')
                                    ->select('multiple_choices.*', 'statuses.status_name')
                                    ->where('multiple_choices.question_id', $req->session()->get('question_id'))
                                    ->get();
        $status=Status::all();
        return view('adminquestiondetails',['data'=>$data,'choices'=>$choices,'statusList'=>$status]);
    }

    function firstLoadChoiceView($choice_id){
        $data = DB::table('multiple_choices')->where('multiple_choice_id', $choice_id)->get();
        $status = Status::all();
        return view('adminchoiceupdate',['data'=>$data,'status'=>$status]);
    }

    function updateChoice(Request $req){
        DB::table('multiple_choices')
              ->where('multiple_choice_id',$req->input('choiceId'))
              ->update(
                ['choice_name'=>$req->input('choiceName'),
                'status_id'=>$req->input('statusId')]
                );
        
        $req->session()->flash('successMsg','Multiple choice is successfully updated');
        
        $data = DB::table('questions')->where('question_id', $req->session()->get('question_id'))->get();
        $choices=DB::table('multiple_choices')->join('questions','multiple_choices.question_id','questions.question_id')
                                    ->join('statuses','multiple_choices.status_id','statuses.status_id')
                                    ->select('multiple_choices.*', 'statuses.status_name')
                                    ->where('multiple_choices.question_id', $req->session()->get('question_id'))
                                    ->get();
        $status=Status::all();
        return view('adminquestiondetails',['data'=>$data,'choices'=>$choices,'statusList'=>$status]);
    }
    
}
