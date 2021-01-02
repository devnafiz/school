 
@extends('backend.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">customer report </li>
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

                 Select Criteria
                 
                </h3>
                <!-- <a href="" class="btn btn-success float-right" target="_blank"><i class="fa fa-download"></i>Download PDF</a> -->
                
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                   <div class="col-md-12">
                    <strong>Customer wise credit Report</strong>
                    <input type="radio" name="customer_wise_report" class="search_value" value="customer_wise_credit">&nbsp; &nbsp;
                    <strong>Customer wise Paid Report</strong>
                    <input type="radio" name="customer_wise_report" class="search_value" value="customer_wise_paid">
                     
                   </div>
                  
                </div>
                <div class="show_credit" style="display: none;">
                  <form method="GET" action="{{route('customers.wise.credit.report')}}" id="customerCreditWiseForm" target="_blank">
                    <div class="form-row">
                       <div class="col-md-8">
                        <label>Customer Name</label>
                        <select name="customer_id" class="form-control select2">
                          <option value=""> select Customer</option>
                          @foreach($customers as $customer)
                          <option value="{{$customer->id}}">{{$customer->name}}-{{$customer->mobile_no}}</option>
                          @endforeach
                         
                        </select>
                         
                       </div>
                       <div class="col-md-4">
                        <button type="submit" class="btn btn-success" style="margin-top:29px; "> search</button>
                         
                       </div>
                      
                    </div>
                  </form>
                  
                </div>
                 <div class="show_paid" style="display: none;">
                     <form method="GET" action="{{route('customers.wise.paid.report')}}" id="customerPaidWiseForm" target="_blank">
                    <div class="form-row">
                       <div class="col-md-8">
                        <label>Customer Name</label>
                        <select name="customer_id" class="form-control select2">
                          <option value=""> select Customer</option>
                           @foreach($customers as $customer)
                          <option value="{{$customer->id}}">{{$customer->name}}-{{$customer->mobile_no}}</option>
                          @endforeach
                         
                        </select>
                         
                       </div>
                      
                       <div class="col-md-2">
                        <button type="submit" class="btn btn-success" style="margin-top:29px; "> search</button>
                         
                       </div>
                      
                    </div>
                  </form>
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

  <script type="text/javascript">
    $(document).on('change','.search_value',function(){
        var search_value=$(this).val();
        if(search_value=='customer_wise_credit'){

          $('.show_credit').show();
        }else{
           $('.show_credit').hide();
        }

        if(search_value=='customer_wise_paid'){

          $('.show_paid').show();
        }else{
           $('.show_paid').hide();
        }

    });
  </script>
   <script>
$(document).ready(function () {
  
  $('#customerCreditWiseForm').validate({

    ignore:[],
    errorPlacement:function(error,element){

      if(element.attr("name")=="customer_id"){error.insertAfter(
        element.next());
      }else{
        error.insertAfter(element);
      }
    },
    errorClass:"text-danger",
    validClass:"text-success",
    rules: {
      customer_id:{
          required:true,
      }
      

      
     
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
<script>

$(document).ready(function () {
  
  $('#customerPaidWiseForm').validate({

    ignore:[],
    errorPlacement:function(error,element){

      if(element.attr("name")=="customer_id"){error.insertAfter(
        element.next());
      }
      
      else{
        error.insertAfter(element);
      }
    },
    errorClass:"text-danger",
    validClass:"text-success",
    rules: {
      customer_id:{
          required:true,
      }
     
      
      

      
     
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


  @endsection