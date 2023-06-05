<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Session;
class LoginController extends Controller
{
    //
    function index(){
        $data=Role::all();
        return view('home',['data'=>$data]);
    }
    function loginAction(Request $req){
        if($req->input('loginUserRole')==1){
            $oldUser = DB::table('users')->where('email', $req->input('loginEmail'))->get();
            // echo var_dump($oldUser);
            if (count($oldUser) > 0){
                $existAcc = DB::table('users')->where('email', $req->input('loginEmail'))     
                                        ->where('password', $req->input('loginPassword'))                                 
                                        ->get();
                if (count($existAcc) > 0){
                    foreach($existAcc as $item){
                        session(['userId' => $item->user_id]);
                    }
                    return view('adminhome');
                }else{
                    $req->session()->flash('duplicate','Your email and password are mismatch');
                    return redirect('/');
                }
            }else{
                $req->session()->flash('duplicate','Your email is invalid');
                return redirect('/');
            }
        }else if($req->input('loginUserRole')==2){
            $oldUser = DB::table('users')->where('email', $req->input('loginEmail'))->get();
            if (count($oldUser) > 0){
                $existAcc = DB::table('users')->where('email', $req->input('loginEmail'))     
                                        ->where('password', $req->input('loginPassword'))                                 
                                        ->get();
                if (count($existAcc) > 0){
                    foreach($existAcc as $item){
                        session(['userId' => $item->user_id]);
                    }
                    return view('userhome');
                }else{
                    $req->session()->flash('duplicate','Your email and password are mismatch');
                    return redirect('/');
                }  
            }else{
                $req->session()->flash('duplicate','Your email is invalid');
                return redirect('/');
            }
        }
    }
}
