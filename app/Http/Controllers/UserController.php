<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view(){
    	$data['allData']=User::where('usertype','admin')->get();
    	return view('backend.user.view-users',$data);
    }

    public function addUser(){

    	//dd('ok');
    	return view('backend.user.add-user');
    }

    public function store(Request $request){
    	$this->validate($request,[
              'name'=>'required',
              'email'=>'required|unique:users,email'

    	]);
        $code=rand(0000,9999);
    	$data= new User();
    	$data->usertype='Admin';
        $data->role=$request->role;

    	$data->name=$request->name;
    	$data->email=$request->email;
    	$data->password=bcrypt($code);
        $data->code=$code;
    	$data->save();
    	return redirect()->route('users.view');
    }
    public function edit($id){
    	$editData=User::find($id);
    	//dd($editData);
    	return view('backend.user.edit-user',compact('editData'));
    }

    public function update(Request $request,$id){
    	$data= User::find($id);
    	
    	$data->name=$request->name;
    	$data->email=$request->email;
        $data->role=$request->role;
    	
    	$data->save();
    	return redirect()->route('users.view')->with('success','user update successfully');
    }
    public function delete($id){
    	$user=User::find($id);
    	$user->delete();
    	return redirect()->route('users.view')->with('success','User deleted');
    }
}
