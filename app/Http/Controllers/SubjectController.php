<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\Supplier;
use App\Subject;
use App\Category;
use App\StudentClass;
use DB;

class SubjectController extends Controller
{
     public function view(){


    //dd('ok');
     	$data['allData']=Subject::all();
     	return view('backend.setup.subject_type.view-subject',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	return view('backend.setup.subject_type.add-subject');
     }

     public function store(Request $request){

     	$subject_type=new Subject;

     	
     	$subject_type->name=$request->name;
     	
     	$subject_type->save();
     	return redirect()->route('subject.type.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=Subject::find($id);
         
     	//dd($editData);
     	return view('backend.setup.subject_type.edit-subject',$data);
     }

     public function update(Request $request,$id){
     	$subject_type=Subject::find($id);

     	

     	
     	$subject_type->name=$request->name;
     	
     	$product->save();
     	return redirect()->route('subject.type.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$product=Product::find($id);

     	$product->delete();


     	return redirect()->route('subject.type.view')->with('Success',' deleted Successfully!');
     }
}
