<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class RegistrationController extends Controller
{
    //
    function index(){
        $data=Role::all();
        return view('register',['data'=>$data]);
    }
    function userRegister(Request $req){
        // $oldUser=User::find($req->input('regEmail'));
        $oldUserByEmail = DB::table('users')->where('email', $req->input('regEmail'))->first();
        if($oldUserByEmail!=null){
            $req->session()->flash('duplicate','Your email is already used. Please try with another email');
            return redirect('/userRegister');
        }
        $oldUserByNrc = DB::table('users')->where('nrc', $req->input('regNrc'))->first();
        if($oldUserByNrc!=null){
            $req->session()->flash('duplicate','Your nrc number is duplicated');
            return redirect('/userRegister');
        }
        $oldUserByPhone = DB::table('users')->where('phone_no', $req->input('regPhone'))->first();
        if($oldUserByPhone!=null){
            $req->session()->flash('duplicate','Your phone number is duplicated');
            return redirect('/userRegister');
        }
        //creating a user account
        $user=new User;
        $user->role_id=$req->input('regUserRole');
        $user->first_name=$req->input('regFirstName');
        $user->last_name=$req->input('regLastName');
        $user->email=$req->input('regEmail');
        $user->password=$req->input('regPassword');
        $user->father_name=$req->input('regFatherName');
        $user->gender=$req->input('regGender');
        $user->nrc=$req->input('regNrc');
        $user->phone_no=$req->input('regPhone');
        $user->address=$req->input('regAddress');
        $user->save();
        $req->session()->flash('accSuccess','User account is successfully created');
        return redirect('/');
    }
}
