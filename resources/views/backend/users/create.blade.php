 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        @if($mode == 'Edit')
          <div class="col-sm-6">
            <h1 class="m-0">Update User</h1>
          </div><!-- /.col -->
          @else
           <div class="col-sm-6">
            <h1 class="m-0">Add User</h1>
          </div><!-- /.col -->
          @endif
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('user.store') }}" class="btn btn-danger"> <i class="fa fa-list"></i> User List </a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



  
<!-- DataTales Example -->
<div class="card shadow page-header mb-4">
  <div class="col-md-6">
    @if($mode == 'Edit')
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"> Update User</h6>
    </div>
    @else

     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"> Add User</h6>
    </div>

    @endif
  </div>
   <div class="col-md-6">
     


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

    {{  Form::model($user,['route' =>['user.update',$user->id], 'method' => 'put']) }}
   
    @else

    {!! Form::open(['route' => 'user.store','method' => 'post']) !!}

    @endif
{{-- 
  <div class="form-group">
    <label for="user_type">Role<span class="text-danger">*</span></label>
     <select name="user_type" id="user_type"  class="form-control">
       <option value="">Select Role</option>
        <option value="Admin">Admin</option>
       <option value="User">User</option>
     </select>
  </div> --}}


  <div class="form-group">
    <label for="name">Name<span class="text-danger">*</span></label>
     {{ Form::text('name', NULL, [ 'required','class'=>'form-control', 'id' => 'name', 'placeholder' => 'Name' ]) }}
  </div>

  <div class="form-group">
    <label for="email">E-mail<span class="text-danger">*</span></label>
     {{ Form::text('email', NULL, [ 'class'=>'form-control', 'id' => 'email', 'placeholder' => 'Email' ]) }}
  </div>

@if($mode == 'create')
  <div class="form-group">
    <label for="password">Password<span class="text-danger">*</span></label>
  
           {{-- {{ Form::password('password', NULL, [ 'class'=>'form-control', 'id' => 'password', 'placeholder' => 'Password' ]) }} --}}
  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    

  </div>

  <div class="form-group">
    <label for="password">Confirm Password<span class="text-danger">*</span></label>
     {{-- {{ Form::password('password', NULL, [ 'class'=>'form-control', 'id' => 'password', 'placeholder' => 'Password' ]) }} --}}
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
  </div>
@else

@endif
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