<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentYear;

class StudentYearController extends Controller
{
     public function view(){


    //dd('ok');
     	$data['allData']=StudentYear::all();
     	return view('backend.setup.student_year.view-year',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	return view('backend.setup.student_year.add-year');
     }

     public function store(Request $request){

     	$student_year=new StudentYear;

     	
     	$student_year->name=$request->name;
     	
     	$student_year->save();
     	return redirect()->route('setups.student.year.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=StudentYear::find($id);
         
     	//dd($editData);
     	return view('backend.setup.student_year.edit-year',$data);
     }

     public function update(Request $request,$id){
     	$student_year=StudentYear::find($id);

     	

     	
     	$student_year->name=$request->name;
     	
     	$product->save();
     	return redirect()->route('products.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$product=StudentYear::find($id);

     	$product->delete();


     	return redirect()->route('products.view')->with('Success',' deleted Successfully!');
     }
}
