<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;

class RoleUserController extends Controller
{
    //
    public function index(){
        $roleuser=RoleUser::all();
        $data=['roleuser'=>$roleuser];
        return $data;
    }
    public function create(Request $request){
        $roleuser=new RoleUser();
        $roleuser->role_name=$request->role_name;
        $roleuser->save();
        return "Data sukses tersimpan";
    }
}
