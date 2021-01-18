<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;

class DesignationController extends Controller
{
    public function view(){


    //dd('ok');
     	$data['allData']=Designation::all();
     	return view('backend.setup.designation.view-designation',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	return view('backend.setup.designation.add-designation');
     }

     public function store(Request $request){

     	$designation=new Designation;

     	
     	$designation->name=$request->name;
     	
     	$designation->save();
     	return redirect()->route('designation.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=Designation::find($id);
         
     	//dd($editData);
     	return view('backend.setup.designation.edit-designation',$data);
     }

     public function update(Request $request,$id){
     	$designation=Designation::find($id);

     	

     	
     	$designation->name=$request->name;
     	
     	$designation->save();
     	return redirect()->route('designations.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$designation=Designation::find($id);

     	$designation->delete();


     	return redirect()->route('designations.view')->with('Success',' deleted Successfully!');
     }
}
