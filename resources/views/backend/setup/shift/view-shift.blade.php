 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Student Shift</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('shift.create') }}" class="btn btn-danger"> <i class="fa fa-plus-circle"></i> Add Shift </a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- DataTales Example -->
<div class="card shadow page-header mb-4">
   <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Shift List</h6>
    </div>
   
      
    
  <div class="card-body">
     <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>                                              
                    <th>SL.</th>                          
                    <th>Shift</th>                            
                    <th class="text-right">Actions</th>                     
                    </tr>
                </thead>

               <tfoot>
                   <tr>                                              
                    <th>SL.</th>      
                    <th>Shift</th>                        
                    <th class="text-right">Actions</th>                     
                    </tr>
            </tfoot>

                                    
       <tbody>
@foreach($shift as $key=>$shift)
       <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $shift->shift }}</td>
          

          
          <td class="text-right">
         <form method='post' action="{{ route('shift.destroy',['shift' => $shift->id]) }}">
            @csrf
{{--         <a href=""class="btn btn-info">
          <i class="fa fa-eye"></i>
         </a>   --}} 
        <a href="{{ route('shift.edit',['shift' => $shift->id]) }}"class="btn btn-info">
          <i class="fa fa-edit"></i>
         </a>  

        @method('DELETE')               
       <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button> 
    </form>                                
   </td>
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