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
     	$data['allData']=AssignSubject::all();
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
     	$countClass=count($request->class_id);
     	if($countClass !=null){
     		for ($i=0; $i < $countClass; $i++) { 
     		 $fee_amount=new FeeCategoryAmount();

     		 $fee_amount->fee_category_id=$request->fee_category_id;
     		 $fee_amount->class_id=$request->class_id[$i];
     		 $fee_amount->amount=$request->amount[$i];
     		 $fee_amount->save();
     	}

     	}
     
     	return redirect()->route('setups.fee.amount.view')->with('success','data save Successfully');
     }

     public function edit($fee_category_id){

     	$data['editData']=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
     	$data['fee_category']=FeeCategory::all();
     	$data['classes']=StudentClass::all();
         
     	//dd($editData);
     	return view('backend.setup.fee_amount.edit-fee-amount',$data);
     }

     public function update(Request $request,$fee_category_id){
     	if($request->class_id==Null){
     		return redirect()->back()->with('error','In valid data sent');

     	}else{
                 FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
              $countClass=count($request->class_id);
     	
     		for ($i=0; $i < $countClass; $i++) { 
     		 $fee_amount=new FeeCategoryAmount();

     		 $fee_amount->fee_category_id=$request->fee_category_id;
     		 $fee_amount->class_id=$request->class_id[$i];
     		 $fee_amount->amount=$request->amount[$i];
     		 $fee_amount->save();
     	

     	}
     	}
     	
     	return redirect()->route('setups.fee.amount.view')->with('success','data updated Successfully');
     }

     public function details($fee_category_id){

     		$data['editData']=FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
     			$data['fee_category']=FeeCategory::all();
     	$data['classes']=StudentClass::all();
     	
         
     	//dd($editData);
     	return view('backend.setup.fee_amount.details-fee-amount',$data);

     }

     public function delete(Request $request){

     	$fee_category=FeeCategory::find($id);

     	$fee_category->delete();


     	return redirect()->route('setups.fee.category.view')->with('Success',' deleted Successfully!');
     }
}
