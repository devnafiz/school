 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Fee Category Amount</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fee Amount details</li>
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

                  Fee Category List
                
                </h3>
                <a href="{{route('setups.fee.amount.view')}}" class="btn btn-success float-right"><i class="fa fa-list-circle"></i>fee amount list</a>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                     <div class="add_item">
                  <div class="form-row">
                     <div class="col-md-6">
                      <label for="email"> Fee Category</label>
                        <select class="form-control" name="fee_category_id">
                           <option value="">Fee Category</option>
                           @foreach($fee_category as $category)
                             <option value="{{$category->id}}" {{($editData[0]->fee_category_id==$category->id)?"selected":""}}>{{$category->name}}</option>

                           @endforeach
                        </select>
                      
                    </div>
                    
                  </div>
                @foreach($editData as $edit)
                 <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                   <div class="form-row">
                     <div class="col-md-5">
                      <label for="email"> Class Name</label>
                        <select class="form-control" name="class_id[]" disabled>
                           <option value="">Class Name</option>
                            @foreach($classes as $cls)
                             <option value="{{$cls->id}}" {{($edit->class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>

                           @endforeach
                        </select>
                      
                    </div>
                    <div class="col-md-5">
                      <label for="email"> Amount</label>
                        <input type="text" name="amount[]" class="form-control" value="{{$edit->amount}}" disabled="">
                      
                    </div>

                    
                  </div>
                </div>
                  @endforeach
                </div>
              
                  </div>
                  

                  
                
               
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