 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Add Student</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('student.registration.view') }}" class="btn btn-danger"> <i class="fa fa-list"></i> Student List </a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



  
<!-- DataTales Example -->
<div class="card shadow page-header mb-4 justify-content-center">
  <div class="col-md-6">

<div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Add Student</h6>
</div>
  </div>

  
 <div class="col-md-9 justify-content-center">
    
@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

{{--  @if($mode == 'Edit')
    {{  Form::model($amount,['route' =>['amount.update',$amount->id], 'method' => 'put']) }}
    @else --}}
    {{-- {!! Form::open(['route' => 'amount.store','method' => 'post']) !!} --}}
{{-- @endif --}}



<div class="card-body">

  <form action="{{  route('setup.assign.subject.store')  }}" method="post" 
  enctype="multipart/form-data">
    @csrf
  <div class="form-row">
     
   <div class="form-group col-md-4">
    <label for="name">Student Name<span class="text-danger">*</span></label>
     <input type="text" name="name" class="form-control form-control-sm">

     <font style="color: red">{{ ($errors->has('name'))?($errors->first('name')):'' }} </font>
  </div>

  <div class="form-group col-md-4">
    <label for="name">Father's Name<span class="text-danger">*</span></label>
     <input type="text" name="fname" class="form-control form-control-sm">
     <font style="color: red">{{ ($errors->has('fname'))?($errors->first('fname')):'' }} </font>
  </div>
 
  <div class="form-group col-md-4">
    <label for="name">Mother's Name<span class="text-danger">*</span></label>
     <input type="text" name="mname" class="form-control form-control-sm" >
     <font style="color: red">{{ ($errors->has('mname'))?($errors->first('mname')):'' }} </font>
  </div>

  <div class="form-group col-md-4">
    <label for="name">Mobile No<span class="text-danger">*</span></label>
     <input type="text" name="mobile" class="form-control form-control-sm">
     <font style="color: red">{{ ($errors->has('mobile'))?($errors->first('mobile')):'' }} </font>
  </div>

 <div class="form-group col-md-4">
    <label for="name">Address<span class="text-danger">*</span></label>
     <input type="text" name="address" class="form-control form-control-sm">
     <font style="color: red">{{ ($errors->has('address'))?($errors->first('address')):'' }} </font>
  </div>

 <div class="form-group col-md-4">
    <label for="name">Gender<span class="text-danger">*</span></label>
		<select name="gender" class="form-control">
			<option value="">Select Gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
     <font style="color: red">{{ ($errors->has('gender'))?($errors->first('gender')):'' }} </font>
  </div>

 <div class="form-group col-md-4">
    <label for="name">Religion<span class="text-danger">*</span></label>
		<select name="religion" class="form-control">
			<option value="">Select Religion</option>
			<option value="Muslim">Muslim</option>
			<option value="Hindu">Hindu </option>
			<option value="Khristan">Khristan </option>
		</select>
     <font style="color: red">{{ ($errors->has('religion'))?($errors->first('religion')):'' }} </font>
  </div>

<div class="form-group col-md-4">
    <label for="name">Date of Birth<span class="text-danger">*</span></label>
     <input type="date" name="dob" class="form-control form-control-sm">
     <font style="color: red">{{ ($errors->has('dob'))?($errors->first('dob')):'' }} </font>
  </div>

<div class="form-group col-md-4">
    <label for="name">Discount<span class="text-danger">*</span></label>
     <input type="text" name="discount" class="form-control form-control-sm">
     <font style="color: red">{{ ($errors->has('discount'))?($errors->first('discount')):'' }} </font>
  </div>

   <div class="form-group col-md-4">
    <label for="name">Year<span class="text-danger">*</span></label>
		<select name="year_id" class="form-control">
			<option value="">Select Year</option>
			@foreach($years as $year)
			<option value="{{ $year->year_id }}">{{ $year->year }}</option>
			@endforeach
		</select>
     <font style="color: red">{{ ($errors->has('year_id'))?($errors->first('year_id')):'' }} </font>
  </div>

  <div class="form-group col-md-4">
    <label for="name">Class<span class="text-danger">*</span></label>
		<select name="class_id" class="form-control">
			<option value="">Select Class</option>
			@foreach($classes as $clas)
			<option value="{{ $clas->class_id }}">{{ $clas->name }}</option>
			@endforeach
		</select>
     <font style="color: red">{{ ($errors->has('class_id'))?($errors->first('class_id')):'' }} </font>
  </div>


  <div class="form-group col-md-4">
    <label for="name">Shift</label>
		<select name="shift_id" class="form-control">
			<option value="">Select Shift</option>
			@foreach($shifts as $shift)
			<option value="{{ $shift->shift_id }}">{{ $shift->shift }}</option>
			@endforeach
		</select>
     <font style="color: red">{{ ($errors->has('shift_id'))?($errors->first('shift_id')):'' }} </font>
  </div>

  <div class="form-group col-md-4">
    <label for="name">Group</label>
		<select name="group_id" class="form-control">
			<option value="">Select Group</option>
			@foreach($groups as $group)
			<option value="{{ $group->group_id }}">{{ $group->group }}</option>
			@endforeach
		</select>
     <font style="color: red">{{ ($errors->has('group_id'))?($errors->first('group_id')):'' }} </font>
  </div>


  <div class="form-group col-md-4">
    <label for="name">Image</label>
	<input type="file" name="image" class="form-control form-control-sm" id='image'>
     <font style="color: red">{{ ($errors->has('image'))?($errors->first('image')):'' }} </font>
  </div>

 <div class="form-group col-md-4">
    <img id="showImage" alt="problem" src="{{url('public/images/amar.jpg')}}" style="width:150px;height: 100px;border:1px solid #000;">
  </div>



  </div>
  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </form>
</div>

 

   </div>
 </div>


 </div>     

<script src="{{ asset('backend/jquery-3.6.0.min.js') }}"></script>


@stop