 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Assign Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assign Subject </li>
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

                 Edit Assign Subject 
                
                </h3>
                <a href="{{route('subject.assign.subject.view')}}" class="btn btn-success float-right"><i class="fa fa-list-circle"></i>Assign Subjects list</a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('subject.assign.subject.update',$editData[0]->class_id)}}" method="post" id="myForm">
                  {{csrf_field()}}
                     <div class="add_item">
                  <div class="form-row">
                     <div class="col-md-6">
                      <label for="email">Class Name</label>
                        <select class="form-control" name="class_id">
                           <option value="">Class Name</option>
                           @foreach($classes as $class)
                             <option value="{{$class->id}}" {{($editData[0]->class_id==$class->id)?"selected":""}}>{{$class->name}}</option>

                           @endforeach
                        </select>
                      
                    </div>
                    
                  </div>
            @foreach($editData as $edit)
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                   <div class="form-row">
                     <div class="col-md-4">
                      <label for="email"> Subject Name</label>
                        <select class="form-control" name="subject_id[]">
                           <option value="">Subject Name</option>
                            @foreach($subjects as $sub)
                             <option value="{{$sub->id}}" {{($edit->subject_id==$sub->id)?"selected":""}}>{{$sub->name}}</option>

                           @endforeach
                        </select>
                      
                    </div>
                    <div class="col-md-2">
                      <label for="email"> Full Mark</label>
                        <input type="text" name="full_mark[]" class="form-control" value="{{$edit->full_mark}}">
                      
                    </div>

                    <div class="col-md-2">
                      <label for="email"> Pass Mark</label>
                        <input type="text" name="pass_mark[]" class="form-control" value="{{$edit->pass_mark}}">
                      
                    </div>
                    <div class="col-md-2">
                      <label for="email"> Subjective Mark</label>
                        <input type="text" name="get_mark[]" class="form-control" value="{{$edit->get_mark}}">
                      
                    </div>

                    <div class="col-md-2">
                      <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle "></i></span>
                      <span class="btn btn-success removeeventmore"><i class="fa fa-minus-circle "></i></span>
                       
                      
                    </div>
                    
                  </div>
                </div>
                  @endforeach
                </div>
              
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                      <input type="submit" value="submit" class="btn btn-primary">
                       
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
                <div style="visibility: hidden;"> 
                  <div class="whole_extra_item_add" id="whole_extra_item_add">
                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                      <div class="form-row">
                        <div class="col-md-5">
                      <label for="email"> Subject Name</label>
                        <select class="form-control" name="subject_id[]">
                           <option value="">Subject Name</option>
                            @foreach($subjects as $sub)
                             <option value="{{$sub->id}}">{{$sub->name}}</option>

                           @endforeach
                        </select>
                      
                    </div>
                    <div class="col-md-2">
                      <label for="email"> Full Mark</label>
                        <input type="text" name="full_mark[]" class="form-control">
                      
                    </div>

                    <div class="col-md-2">
                      <label for="email"> Pass Mark</label>
                        <input type="text" name="pass_mark[]" class="form-control">
                      
                    </div>
                    <div class="col-md-2">
                      <label for="email"> Subjective Mark</label>
                        <input type="text" name="get_mark[]" class="form-control">
                      
                    </div>

                    <div class="col-md-2">
                      <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle "></i></span>
                      <span class="btn btn-success removeeventmore"><i class="fa fa-minus-circle "></i></span>
                       
                      
                    </div>
                        
                      </div>
                      
                    </div>
                    

                  </div>


                </div>

           
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
  };
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    var counter= 0;
    //alert('hi');
    $(document).on("click",".addeventmore",function(){

      var whole_extra_item_add=$("#whole_extra_item_add").html();
      $(this).closest(".add_item").append(whole_extra_item_add);
      counter++;



    });
     $(document).on("click",".removeeventmore",function(){
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter-=1;
      });
  });
</script>

  @endsection