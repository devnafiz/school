 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Sudent</h1>
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

                 student  List
                 
                </h3>
                <a href="{{route('students.reg.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> add student</a>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="" method="GET" id="myform">
                   <div class="form-row">
                     <div class="col-md-4">
                      <label for="email">Class <font style="color:red">*</font></label>
                      <select name="class_id" class="form-control">
                        <option>select class</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}"  {{(@class_id==$class->id) ?'selected':''}}>{{$class->name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                    <div class="col-md-4">
                      <label for="email">Year <font style="color:red">*</font></label>
                      <select name="year_id" class="form-control">
                        <option value="">select Year</option>
                        @foreach($years as $yr)
                        <option value="{{$yr->id}}" {{(@year_id==$yr->id) ?'selected':''}}>{{$yr->name}}</option>
                        @endforeach
                        
                      </select>
                      
                    </div>
                    <div class="col-md-3" style="padding-top: 28px;">
                      <button type="submit" class="btn btn-sm btn-success"  name="search">search</button>
                    </div>
                     
                   </div>

                </form>
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                   
                    
                    <th>Name</th>
                    <th>Id Number</th>
                    <th>Roll</th>
                    <th>Year</th>
                    <th>Class</th>
                    <th>code</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($allData as $key=>$value)

                   <tr class="{{$value->id}}">
                     
                     <td>{{$key+1}}</td>
                     <td>{{$value->class_id}}</td>
                     <td>{{$value->class_id}}</td>
                     <td>{{$value->class_id}}</td>
                     
                     <td>{{$value->year_id}}</td>
                     <td><a href="{{route('students.reg.edit',$value->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                      </td>
                   </tr>

                  @endforeach
                
                  </tbody>
                  
                </table>
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
  <script type="text/javascript">
    
    $(document).ready(function(){

        $(document).on('click','#delete',function(){
           var actionTo=$(this).attr('href');
           var token=$(this).attr('data-token');
           var id=$(this).attr('data-id');

           Swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        },
        function(isConfirm){

          if(isConfirm){
            $.ajax({
                    url:actionTo,
                    type:'post',
                    data:{id:id,_token:token},
                    success:function(data){
                      
                      Swal({
                          title:"deleted",
                          type:"success"
                      },function(isConfirm){

                          if(isConfirm){
                            $('.'+id).fadeOut()
                          }
                      });



                      
                    }


            });
          }else{
            swal("cancelled","","error");
          }
        });

        return false;
       



        });

    });
  </script>

  @endsection