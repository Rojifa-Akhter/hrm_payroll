<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{ static_asset('assets/dist/img/AdminLTELogo.png') }}"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ static_asset('assets/dist/img/user2-160x160.jpg') }}"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('dashboard')}}" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              

              <li class="nav-item">
                <a href="{{route('employees')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manpower Requisition</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('employees')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('resigned_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resigned Employee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('rejected_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terminated Employee</p>
                </a>
              </li>


              <li class="nav-item">
                    <a href="{{route('work_program_list')}}"  class="nav-link" >
                        <i class="far fa-circle nav-icon"></i>
                        <p>Work Programs List</p>
                    </a>
                </li>

              <li class="nav-item">
                <a href="{{route('employee_report_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
              
            </ul>
          </li>

        <!-- Leave Start -->

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Leave
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{route('full_leave_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"  ></i>
                  <p>Full Leaves</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('halfLeave_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Half Leave</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{ route('shortleave_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Short Leave</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('leave_report_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li> 

          
              </ul>
          </li>


         <!-- Leave End -->


        <!-- Attendance Start -->

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Attendance
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">


             

              <li class="nav-item">
                <a href="{{route('attendances_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Attendance</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('confirmattendances_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Attendance</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('shortmovementregister_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Short Movement Register</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('movementregister_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Full Day Movement Register</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Attendance</p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{route('attendance_report_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>

          
        </ul>

      </li>


      <!-- Attendance End -->


        <!-- Payroll Start -->


        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Payroll
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('salary_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p>Salary</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"  ></i>
                  <p>Others</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{route('salary_arrear_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-info"></i>
                  <p>Salary Arrear</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('absent_payments_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Absent Payments</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ route('increment_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Increment</p>
                </a>
              </li>    

              <li class="nav-item">
                <a href="{{route('payroll_report_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>


              </ul>

        </li>


      <!-- Payroll End -->


      <!-- Section Start -->

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('company_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Holiday Calendar</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('designation_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>  

               <li class="nav-item">
                <a href="{{ route('bank_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banks</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('shift_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shifts</p>
                </a>
              </li>
              

               <li class="nav-item">
                <a href="{{ route('department_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('leavetype_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Type</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{route('sections_list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Section</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('subsection_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subsection</p>
                </a>
              </li>

              
              
            </ul>
          </li>


        <!-- Setting End --> 



        <!-- Acl Role Start -->


        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Acl Role
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('salary_list')}}"  class="nav-link" >
                  <i class="far fa-circle nav-icon text-white"></i>
                  <p>Acl Role</p>
                </a>
              </li>
             


             
              </ul>

        </li>


      <!-- Acl End --> 

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>