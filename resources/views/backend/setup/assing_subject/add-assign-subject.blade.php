 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Add Student Assign Subject</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('setup.assign.subject.view') }}" class="btn btn-danger"> <i class="fa fa-list"></i> Assign Subject List </a>
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
       <h6 class="m-0 font-weight-bold text-primary">Add Student Assign Subject </h6>
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

  <form action="{{  route('setup.assign.subject.store')  }}" method="post" accept-charset="utf-8">
    @csrf
  <div class="add_item">
     <div class="form-row">
         <div class="form-group col-md-6">
           <label for="">Student Class</label>
          <select name="class_id" class="form-control" required>
            <option value="">Select Class</option>

           @foreach($classes as $key => $cls)
            <option value="{{ $cls->id }}">{{ $cls->name }}</option>}  
           @endforeach

         </select>           
  </div>
</div>  



    <div class="form-row">
         <div class="form-group col-md-2">
           <label for="">Subject</label>
          <select name="subject_id[]" class="form-control" required>
            <option value="">Select Subject</option>
        
         @foreach($subjects as $key => $subject)
            <option value="{{ $subject->id }}">{{ $subject->subject }}</option>}
           @endforeach

          </select>  
         </div>

         <div class="form-group col-md-2">
           <label for="">Full Marks</label>
           <input type="text" name="full_mark[]" class="form-control" placeholder="Full Mark" required>         
         </div>

          <div class="form-group col-md-2">
           <label for="">Pass Marks</label>
           <input type="text" name="pass_mark[]" class="form-control" placeholder="Pass Mark" required>         
         </div>

         <div class="form-group col-md-2">
           <label for="">Get Marks</label>
           <input type="text" name="get_mark[]" class="form-control" placeholder="Get Mark" required>         
         </div>
         <div class="form-group col-md-1" style="padding-top: 30px;" >
           <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span> 
         </div>

     </div>  
 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

 


 {{-- when clicking (+ icon) then show it --}}

<div style="visibility: hidden;">
 <div class="whole_extra_item_add" id='whole_extra_item_add'>
   <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
         <div class="form-row">
         <div class="form-group col-md-2">
           <label for="">Subject</label>
          <select name="subject_id[]" class="form-control" required>
            <option value="">Select Subject</option>

           @foreach($subjects as $key => $subject)
            <option value="{{ $subject->id }}">{{ $subject->subject }}</option>}
           @endforeach

          </select>   
         </div>

         <div class="form-group col-md-2">
           <label for="">Full Marks</label>
           <input type="text" name="full_mark[]" class="form-control" placeholder="Full Mark" required>         
         </div>

          <div class="form-group col-md-2">
           <label for="">Pass Marks</label>
           <input type="text" name="pass_mark[]" class="form-control" placeholder="Pass Mark" required>         
         </div>

         <div class="form-group col-md-2">
           <label for="">Get Marks</label>
           <input type="text" name="get_mark[]" class="form-control" placeholder="Get Mark" required>         
         </div>

     </div>  

  <div class="form-group" style="margin-right: 20%;">
    <div class="form-row col-md-3">
      <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span> 
      <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
  </div>
</div>
{{-- {!! Form::close() !!}       --}}

   </div>
 </div>


 </div>     



   </div> 
 </div> 

</div>

<script src="{{ asset('backend/jquery-3.6.0.min.js') }}"></script>


<script type="text/javascript">

  $(document).ready( function()  {

    var counter = 0;

    $(document).on('click','.addeventmore', function()  {
   
    var whole_extra_item_add = $ ("#whole_extra_item_add").html();
    $(this).closest(".add_item").append(whole_extra_item_add);
    counter ++;

    });

    $(document).on('click','.removeeventmore',function(event) {

      $(this).closest('.delete_whole_extra_item_add').remove();

      counter -= 1 ;

    });

  });


</script>


@stop