<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentShift;

class StudentShiftController extends Controller
{
     public function view(){


    //dd('ok');
     	$data['allData']=StudentShift::all();
     	return view('backend.setup.student_shift.view-shift',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	return view('backend.setup.student_shift.add-shift');
     }

     public function store(Request $request){

     	$student_shiftr=new StudentShift;

     	
     	$student_shiftr->name=$request->name;
     	
     	$student_shiftr->save();
     	return redirect()->route('setups.student.shift.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=StudentShift::find($id);
         
     	//dd($editData);
     	return view('backend.setup.student_shift.edit-shift',$data);
     }

     public function update(Request $request,$id){
     	$student_shift=StudentShift::find($id);

     	

     	
     	$student_shift->name=$request->name;
     	
     	$student_shift->save();
     	return redirect()->route('setups.student.shift.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$student_shift=StudentShift::find($id);

     	$student_shift->delete();


     	return redirect()->route('setups.student.shift.view')->with('Success',' deleted Successfully!');
     }
}
