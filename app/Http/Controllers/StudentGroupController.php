<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentYear;
use App\StudentGroup;

class StudentGroupController extends Controller
{
    public function view(){


    //dd('ok');
     	$data['allData']=StudentGroup::all();
     	return view('backend.setup.student_group.view-group',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	return view('backend.setup.student_group.add-group');
     }

     public function store(Request $request){

     	$student_group=new StudentGroup;

     	
     	$student_group->name=$request->name;
     	
     	$student_group->save();
     	return redirect()->route('setups.student.group.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=StudentGroup::find($id);
         
     	//dd($editData);
     	return view('backend.setup.student_group.edit-group',$data);
     }

     public function update(Request $request,$id){
     	$student_group=StudentGroup::find($id);

     	

     	
     	$student_group->name=$request->name;
     	
     	$student_group->save();
     	return redirect()->route('setups.student.group.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$group=StudentGroup::find($id);

     	$group->delete();


     	return redirect()->route('setups.student.group.view')->with('Success',' deleted Successfully!');
     }
}
