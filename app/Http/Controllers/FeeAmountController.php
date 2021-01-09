<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentShift;
use App\FeeCategory;
use App\FeeCategoryAmount;
use App\StudentClass;

class FeeAmountController extends Controller
{
      public function view(){


    //dd('ok');
     	$data['allData']=FeeCategoryAmount::all();
     	return view('backend.setup.fee_amount.view-amount',$data);
     }


     public function add(){
         // $suppliers=Supplier::all();
         // $categories=Category::all();
         // $units=Unit::all();
     	$data['fee_category']=FeeCategory::all();
     	$data['classes']=StudentClass::all();
     	return view('backend.setup.fee_amount.add-fee-amount',$data);
     }

     public function store(Request $request){
     	$countClass=count($request->class_id);
     	if($countClass !=null){

     	}
     	for ($i=0; $i < ; $i++) { 
     		# code...
     	}

     	$fee_category=new FeeCategory;

     	
     	$fee_category->name=$request->name;
     	
     	$fee_category->save();
     	return redirect()->route('setups.fee.category.view')->with('success','data save Successfully');
     }

     public function edit($id){

     	$data['editData']=FeeCategory::find($id);
         
     	//dd($editData);
     	return view('backend.setup.fee_category.edit-fee',$data);
     }

     public function update(Request $request,$id){
     	$fee_category=FeeCategory::find($id);

     	

     	
     	$fee_category->name=$request->name;
     	
     	$fee_category->save();
     	return redirect()->route('setups.fee.category.view')->with('success','data updated Successfully');
     }

     public function delete(Request $request){

     	$fee_category=FeeCategory::find($id);

     	$fee_category->delete();


     	return redirect()->route('setups.fee.category.view')->with('Success',' deleted Successfully!');
     }
}
