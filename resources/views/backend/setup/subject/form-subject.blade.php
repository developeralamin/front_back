 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          @if($mode == 'Create')

           <div class="col-sm-6">
            <h1 class="m-0">Add Student Subject </h1>
          </div><!-- /.col -->
      @else

        <div class="col-sm-6">
            <h1 class="m-0">Update Student Subject</h1>
          </div><!-- /.col -->

        @endif

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('setup_subject.store') }}" class="btn btn-danger"> <i class="fa fa-list"></i>All Subject List</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



  
<!-- DataTales Example -->
<div class="card shadow page-header mb-4 justify-content-center">
  <div class="col-md-6">
  
  @if($mode == 'Create')

     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Add Student Subject </h6>
    </div>
@else

<div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Update Student Subject</h6>
    </div>

@endif



  </div>
 <div class="col-md-6 justify-content-center">
     


@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

     

    @if($mode == 'Edit')

    {{  Form::model($subjects,['route' =>['setup_subject.update',$subjects->id], 'method' => 'put']) }}
   
    @else

    {!! Form::open(['route' => 'setup_subject.store','method' => 'post']) !!}

    @endif


  <div class="form-group">
    <label for="name">Subject<span class="text-danger">*</span></label>
     {{ Form::text('subject', NULL, [ 'required', 'class'=>'form-control', 'id' => 'name', 'placeholder' => 'Type your Subject' ]) }}
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}      

   </div>
 </div>


 </div>     
   </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop