<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignSubject;
use App\FeeCategory;
use App\FeeCategoryAmount;
use App\StudentClass;
use App\Subject;

class AssignSubjectController extends Controller
{
     public function view(){


    //dd('ok');
     	$data['allData']=AssignSubject::select('class_id')->groupBy('class_id')->get();
     	//$data['allData']=FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
     	return view('backend.setup.assign_subject.view-assign-subject',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	$data['subjects']=Subject::all();
     	$data['classes']=StudentClass::all();
     	return view('backend.setup.assign_subject.add-assign-subject',$data);
     }

     public function store(Request $request){
     	$countSubject=count($request->subject_id);
     	if($countSubject !=null){
     		for ($i=0; $i < $countSubject; $i++) { 
     		 $assign_sub=new AssignSubject();

     		 $assign_sub->class_id=$request->class_id;
     		 $assign_sub->subject_id=$request->subject_id[$i];
     		 $assign_sub->full_mark=$request->full_mark[$i];
     		 $assign_sub->pass_mark=$request->pass_mark[$i];
     		  $assign_sub->get_mark=$request->get_mark[$i];
     		 $assign_sub->save();
     	}

     	}
     
     	return redirect()->route('subject.assign.subject.view')->with('success','data save Successfully');
     }

     public function edit($class_id){
 
     	$data['editData']=AssignSubject::where('class_id',$class_id)->get();
           //dd($data['editData']);
     	$data['subjects']=Subject::all();
     	$data['classes']=StudentClass::all();
         
     	//dd($editData);
     	return view('backend.setup.assign_subject.edit-assign-subject',$data);
     }

     public function update(Request $request,$class_id){
     	if($request->subject_id==Null){
     		return redirect()->back()->with('error','In valid data sent');

     	}else{
                 AssignSubject::where('class_id',$class_id)->delete();
              $countSubject=count($request->subject_id);
     	
     		for ($i=0; $i < $countSubject; $i++) { 
     		 $assign_sub=new AssignSubject();

     		 $assign_sub->class_id=$request->class_id;
     		 $assign_sub->subject_id=$request->subject_id[$i];
     		 $assign_sub->full_mark=$request->full_mark[$i];
                 $assign_sub->pass_mark=$request->pass_mark[$i];
               $assign_sub->get_mark=$request->get_mark[$i];
     		 $assign_sub->save();
     	

     	}
     	}
     	
     	return redirect()->route('subject.assign.subject.view')->with('success','data updated Successfully');
     }

     public function details($class_id){

     		$data['editData']=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
               $data['subjects']=Subject::all();
               $data['classes']=StudentClass::all();
     	
         
     	//dd($editData);
     	return view('backend.setup.assign_subject.details-assign-subject',$data);

     }

     public function delete(Request $request){

     	$fee_category=FeeCategory::find($id);

     	$fee_category->delete();


     	return redirect()->route('setups.fee.category.view')->with('Success',' deleted Successfully!');
     }
}
