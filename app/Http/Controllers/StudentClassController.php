<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Auth;
use App\Supplier;
use App\Unit;
use App\Category;
use App\StudentClass;
use DB;

class StudentClassController extends Controller
{
     public function view(){


    //dd('ok');
     	$data['allData']=StudentClass::all();
     	return view('backend.setup.student_class.view-class',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	return view('backend.setup.student_class.add-class');
     }

     public function store(Request $request){

     	$student_class=new StudentClass;

     	
     	$student_class->name=$request->name;
     	
     	$student_class->save();
     	return redirect()->route('setups.student.class.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=StudentClass::find($id);
         
     	//dd($editData);
     	return view('backend.setup.student_class.edit-class',$data);
     }

     public function update(Request $request,$id){
     	$student_class=StudentClass::find($id);

     	

     	
     	$student_class->name=$request->name;
     	
     	$product->save();
     	return redirect()->route('products.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$product=Product::find($id);

     	$product->delete();


     	return redirect()->route('products.view')->with('Success',' deleted Successfully!');
     }
}
