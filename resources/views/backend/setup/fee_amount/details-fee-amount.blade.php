 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
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
              <a href="{{ route('amount.store') }}" class="btn btn-danger"> <i class="fa fa-plus-circle"></i> Fee Amount List</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- DataTales Example -->
<div class="card shadow page-header mb-4">
   <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"> Fee Amount Details</h6>
    </div>
   
  <div class="card-body">
 <h4><strong class="text-info"> Category Type : </strong> {{ ($editdata[0]['fee_category']['fee']) }} </h4>

     <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>                                              
                    <th>SL.</th>                          
                    <th>Class</th>                            
                    <th>Amount</th>                             
                                       
                    </tr>
                </thead>

               <tfoot>
                   <tr>                                              
                    <th>SL.</th>                          
                    <th>Class</th>                            
                    <th>Amount</th>                            
                                  
                  </tr>
            </tfoot>

                                    
       <tbody>
@foreach($editdata as $key=>$details)
       <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $details['student_class']['name']  }}</td>
          <td>{{ $details->amount}}</td>
      </tr>

@endforeach
       </tbody>
   </table>
   </div>
  </div>
 </div>


 </div>     

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop