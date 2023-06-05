<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
    function viewProfile(Request $req){
        $userId=$req->session()->get('userId');
        $users=User::where('user_id',$userId)->get();
        $results=DB::table('results')->join('exams','results.exam_id','exams.exam_id')
                                        ->select('results.*', 'exams.exam_name')
                                        ->where('results.user_id',$userId)->get();
        return view('userviewprofile',['users'=>$users,'results'=>$results]);
    }
}
