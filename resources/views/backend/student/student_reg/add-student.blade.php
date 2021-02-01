 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Student </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12 ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>

                 Add Student 
                
                </h3>
                <a href="{{route('students.reg.view')}}" class="btn btn-success float-right"><i class="fa fa-list-circle"></i>Student  list</a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('students.reg.store')}}" method="post" id="myForm" enctype="maltipart/form-data">
                  {{csrf_field()}}

                  <div class="form-row">
                    
                   

                    
                    
                    <div class="col-md-4">
                      <label for="email"> Name<font style="color:red">*</font></label>
                      <input type="text" name="name" class="form-control form-control-sm" >
                      <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Fathers Name<font style="color:red">*</font></label>
                      <input type="text" name="fname" class="form-control form-control-sm" >
                      <font style="color: red">{{($errors->has('fname'))?($errors->first('fname')):''}}</font>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Mother Name<font style="color:red">*</font></label>
                      <input type="text" name="mname" class="form-control form-control-sm" >
                      <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Mobile number<font style="color:red">*</font></label>
                      <input type="text" name="mobile" class="form-control form-control-sm" >
                      <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      
                    </div>
                     <div class="col-md-4">
                      <label for="email">Address<font style="color:red">*</font></label>
                      <input type="text" name="address" class="form-control form-control-sm" >
                      <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Gender<font style="color:red">*</font></label>
                      <select name="gender" class="form-control">
                        <option>select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                      </select>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Religion <font style="color:red">*</font></label>
                      <select name="religion" class="form-control">
                        <option>select religion</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Chritian">Chritian</option>
                        
                      </select>
                      
                    </div>
                    <div class="col-md-4" >
                      <label for="dob">Date of birth <font style="color:red">*</font></label>
                        <div class="input-group input-daterange">
                      <input type="text" class="form-control" name="dob" value="2012-04-05" />
                      
                    </div>
                      
                      
                      </div>

                      <div class="col-md-4" >
                      <label for="email">Discount <font style="color:red">*</font></label>
                        <div class="input-group input-daterange">
                      <input type="text" class="form-control" name="discount" />
                      
                    </div>
                      
                      
                      </div>

                      <div class="col-md-4">
                      <label for="email">Class <font style="color:red">*</font></label>
                      <select name="class_id" class="form-control">
                        <option>select class</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Year <font style="color:red">*</font></label>
                      <select name="year_id" class="form-control">
                        <option value="">select Year</option>
                        @foreach($years as $yr)
                        <option value="{{$yr->id}}">{{$yr->name}}</option>
                        @endforeach
                        
                      </select>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Group</label>
                      <select name="group_id" class="form-control">
                        <option value="">select group</option>
                         @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                        
                      </select>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">shift</label>
                      <select name="shift_id" class="form-control">
                        <option value="">select shift</option>
                         @foreach($shifts as $shift)
                        <option value="{{$shift->id}}">{{$shift->name}}</option>
                        @endforeach
                        
                      </select>
                      
                    </div>
                    <div class="form-group col-md-4">
                      <label>Image</label>
                      <input type="file" name="image" id="image" class="form-control">
                      
                    </div>
                    <div class="form-group col-md-4" >
                      <img id="showImage" src="{{(!empty($editData->image))?url('uploads/user_image/'.$editData->image):url('uploads/user_image/no-image.png')}}" style="height: 100px;width: 80px; border: 1px solid #f32;">
                      
                    </div>
                    </div>

                    
                    
                    
                    
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                      <input type="submit" value="submit" class="btn btn-primary btn-sm">
                       
                     </div>
                    
                  </div>

                  
                </form>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
$(function () {
  
  $('#myForm').validate({
    rules: {
      name:{
          required:true,
     

      
     
    },
    messages: {
        
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
<style type="text/css">
  
  
#datepicker{width:180px; margin: 0 20px 20px 20px;}
#datepicker > span:hover{cursor: pointer;}
</style>

  @endsection