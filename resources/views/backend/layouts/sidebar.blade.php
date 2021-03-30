<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column" 
		data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Management Setup
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">                    
              <li class="nav-item">
                <a href="{{ url('setup') }}" class="nav-link">
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




          </li>
         


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->