@php
   // $prefix = Request::route()->getPrefix();
   // $route  = Route()->current()->getName();

@endphp


<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column" 
		data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           {{-- @if(Auth::user()->usertype=='Admin')     --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>             
            </ul>
          </li>
          {{-- @endif --}}


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('profile') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>             
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Management Setup
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('setup') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Class</p>
                </a>
              </li>             
            </ul>

            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('year') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Year</p>
                </a>
              </li>             
            </ul>


            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('student_group') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Group</p>
                </a>
              </li>             
            </ul>

             <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('shift') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Shift</p>
                </a>
              </li>             
            </ul>

           <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('fee') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category</p>
                </a>
              </li>             
            </ul>

             <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('amount') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category Amount</p>
                </a>
              </li>             
            </ul>

           <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('exam_type') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Type</p>
                </a>
              </li>             
            </ul>

            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('setup_subject') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject View</p>
                </a>
              </li>             
            </ul>

            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('designation_setup') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>             
            </ul>

            
            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{  route('setup.assign.subject.view')  }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Subject</p>
                </a>
              </li>             
            </ul>

          </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Students
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ route('student.registration.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li>             
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->