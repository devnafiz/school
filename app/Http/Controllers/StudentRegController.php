<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssignSudent;
use App\DiscountSudent;
use App\User;
use App\Category;
use App\StudentClass;
use DB;
use App\StudentYear;
use App\StudentGroup;
use App\StudentShift;

class StudentRegController extends Controller
{
    public function view(){
    	$data['allData']=AssignSudent::all();
    	return view('backend.student.student_reg.student-view',$data);


    }

    public function add(){

       $data['years']=StudentYear::all();
       $data['classes']=StudentClass::all();
       $data['groups']=StudentGroup::all();
       $data['shifts']=StudentShift::all();
    	return view('backend.student.student_reg.add-student',$data);
    }

    public function store(Request $request){

      DB::transaction(function() use($request){

       $checkYear=StudentYear::find($request->year_id)->name;
       $student=User::where('usertype','student')->orderBy('id','DESC')->first();
         if($student==null){

          $firstReg=0;
          $studentId=$firstReg+1;
          if($studentId<10){
            $id_no='000'.$studentId;

          }elseif ($studentId<100) {
             $id_no='00'.$studentId;
          }elseif ($studentId<1000) {
             $id_no='0'.$studentId;
          }
         }else{
          $student=User::where('usertype','student')->orderBy('id','DESC')->first()->id;
          $studentId=$student+1;
          if($studentId<10){
            $id_no='000'.$studentId;
          }elseif ($studentId<100) {
            $id_no='00'.$studentId;
          }elseif ($studentId<1000) {
            $id_no='0'.$studentId;
          }
         }
        $final_id_no=$checkYear.$id_no;
        $user=new User();
        $code=rand(0000,9999);
        $user->usertype='student';
        $user->id_no=$final_id_no;
         $user->name=$request->name;
        $user->fname=$request->fname;
        $user->mname=$request->mname;
        
        $user->mobile=$request->mobile;
        $user->gender=$request->gender;
        $user->religion=$request->religion;
         $user->dob=$request->dob;
         if($request->file('image')){

        $file=$request->file('image');
       // @unlink(public_path('uploads/user_image/'.$data->image));
        $filename=date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('uploads/student_images'),$filename);
        $data['image']=$filename;

        }
        $user->password=bcrypt($code);
         $user->code=$code;
         $user->save();

         $assign_student=new AssignSudent();
         $assign_student->student_id=$user->id;
         $assign_student->year_id=$request->year_id;
         $assign_student->class_id=$request->class_id;
         $assign_student->group_id=$request->group_id;
         $assign_student->shift_id=$request->shift_id;
         $assign_student->save();

          $discount_student= new DiscountSudent();
          $discount_student->assign_student_id=$assign_student->id;
          $discount_student->fee_category_id='1';
          $discount_student->discount=$request->discount;
          $discount_student->save();

         



      });
      return redirect()->route('students.reg.view')->with('success','user update successfully');
    }
}
