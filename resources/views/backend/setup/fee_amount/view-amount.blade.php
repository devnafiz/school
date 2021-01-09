 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Fee Category amount</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student  Fee amount</li>
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

                 Fee Amount List
                 
                </h3>
                <a href="{{route('setups.fee.amount.add')}}" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> add Fee amount</a>
              </div><!-- /.card-header -->
              <div class="card-body">
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
                   
                    
                    <th>Fee Category Id</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($allData as $key=>$value)

                   <tr class="{{$value->id}}">
                     
                     <td>{{$key+1}}</td>
                     <td>{{$value->fee_category_id}}</td>
                     <td><a href="{{route('setups.fee.amount.edit',$value->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                      <a href="{{route('setups.value.year.delete')}}" id="delete" class="btn btn-sm btn-danger" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a></td>
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