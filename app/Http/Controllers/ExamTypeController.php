<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamType;
use App\StudentYear;


class ExamTypeController extends Controller
{
    
     public function view(){


    //dd('ok');
     	$data['allData']=ExamType::all();
     	return view('backend.setup.exam_type.view-exam-type',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	return view('backend.setup.exam_type.add-exam-type');
     }

     public function store(Request $request){

     	$exam_type=new ExamType;

     	
     	$exam_type->name=$request->name;
     	
     	$exam_type->save();
     	return redirect()->route('exam.type.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=ExamType::find($id);
         
     	//dd($editData);
     	return view('backend.setup.exam_type.edit-exam-type',$data);
     }

     public function update(Request $request,$id){
     	$exam_type=ExamType::find($id);

     	

     	
     	$exam_type->name=$request->name;
     	
     	$exam_type->save();
     	return redirect()->route('exam.type.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$exam_type=ExamType::find($id);

     	$exam_type->delete();


     	return redirect()->route('exam.type.view')->with('Success',' deleted Successfully!');
     }
}
