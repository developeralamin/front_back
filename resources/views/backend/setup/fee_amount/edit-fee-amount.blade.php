 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Edit Student Fee Amount</h1>
          </div><!-- /.col -->
      
    

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ route('amount.store') }}" class="btn btn-danger"> <i class="fa fa-list"></i> Fee Amount List </a>
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
       <h6 class="m-0 font-weight-bold text-primary">Edit Student Fee Amount</h6>
</div>
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

{{--  @if($mode == 'Edit')

    {{  Form::model($amount,['route' =>['amount.update',$amount->id], 'method' => 'put']) }}
   
    @else --}}
     
    {{-- {!! Form::open(['route' => 'amount.store','method' => 'post']) !!} --}}

{{-- @endif --}}
<div class="card-body">

  <form action="{{  route('amount.update',$editdata[0]->fee_category_id)  }}" method="get" accept-charset="utf-8">
    @csrf
 {{-- @method('PUT') --}}
  <div class="add_item">

     <div class="form-row">
         <div class="form-group col-md-12">
           <label for="">Fee Category</label>
          <select name="fee_category_id" class="form-control" required>
            <option value="">Select Fee Category</option>

           @foreach($fee_categories as $key => $category)
            <option value="{{ $category->id }}" {{ ($editdata['0']->fee_category_id==$category->id)?"selected":"hwlo" }}>{{ $category->fee }}</option>}
            
           @endforeach

          </select>           
         </div>
     </div>  

@foreach($editdata as $edit)
 <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
    <div class="form-row">
         <div class="form-group col-md-5">
           <label for="">Class</label>
          <select name="class_id[]" class="form-control" required>
            <option value="">Select Class</option>

         @foreach($classes as $key => $clas)
            <option value="{{ $clas->id }}" {{ ($edit->class_id==$clas->id)?"selected":"" }}>{{ $clas->name }}</option>}
            
           @endforeach

          </select>           
         </div>

         <div class="form-group col-md-5">
           <label for="">Amount</label>
           <input type="text" name="amount[]" value="{{ $edit->amount }}" class="form-control" placeholder="Amount" required>         
         </div>

         <div class="form-group col-md-1" style="padding-top: 30px;" >
            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span> 
      <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span> 
         </div>

     </div>  
     </div>  
 
@endforeach


  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

 

<div style="visibility: hidden;">
 <div class="whole_extra_item_add" id='whole_extra_item_add'>
   <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
     <div class="form-row">
       <div class="form-group col-md-6">
           <label for="">Class</label>
          <select name="class_id[]" class="form-control" required>
            <option value="">Select Class</option>

         @foreach($classes as $key => $clas)
            <option value="{{ $clas->id }}">{{ $clas->name }}</option>}
            
           @endforeach

          </select>           
         </div>

         <div class="form-group col-md-6">
           <label for="">Amount</label>
           <input type="text" name="amount[]" class="form-control" value="" placeholder="Amount" required>         
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