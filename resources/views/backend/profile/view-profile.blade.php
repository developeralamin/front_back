 @extends('backend.layouts.master')

 @section('main_content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
    
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- DataTales Example -->

   {{-- <div class="row"> --}}
<div class="col-md-4 offset-md-4">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                src="{{ (!empty($user->image))?url('public/upload/user_images/'. 
                $user->image ):url('public/upload/no.png')}}"
                       alt="User profile picture">
          </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

               

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mobile No</b> <a class="float-right">{{ $user->mobile }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{ $user->gender }}</a>
                  </li>
                </ul>

                <a href="{{ route('user.edit',['user' =>$user->id]) }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
     </div>
     
   </div>      
            <!-- Profile Image -->
           





 </div>     

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop