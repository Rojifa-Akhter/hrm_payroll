@extends('layouts.app')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Employee</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Employee</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('main_content')

<div class="container-fluid">
  <div class="row  d-flex  justify-content-center m-auto">
    <div class="col-12 col-sm-6 col-md-12">
      
    <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Edit Service</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper1">
                <div class="bs-stepper-header">
                  <!-- your steps here -->
                  <div class="step active" data-target="#service-part">
                    <a class="step-trigger btn " href="{{ route('employee.edit.service', $id) }}">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Service</span>
                    </a>
                  </div>
                

                <div class="step " data-target="#personal-part">
                    <a class="step-trigger btn " href="{{ route('create.personal', $id) }}">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Personal</span>
                    </a>
                  </div>

                  <div class="step" data-target="#contact-part">
                    <a class="step-trigger btn" href="{{ route('create.contact', $id) }}">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Contact</span>
                    </a>
                  </div>

                  <div class="step" data-target="#academic-part">
                    <a class="step-trigger btn" href="{{ route('list.academic', $id) }}">
                      <span class="bs-stepper-circle">4</span>
                      <span class="bs-stepper-label">Academic</span>
                    </a>
                  </div>

                  <div class="step" data-target="#materials-part">
                    <a class="step-trigger btn" href="{{ route('list.materials', $id) }}">
                      <span class="bs-stepper-circle">5</span>
                      <span class="bs-stepper-label">Materials</span>
                    </a>
                  </div>

                  <div class="step" data-target="#performance-part">
                    <a class="step-trigger btn" href="{{ route('list.performance', $id) }}">
                      <span class="bs-stepper-circle">6</span>
                      <span class="bs-stepper-label">Performance</span>
                    </a>
                  </div>

                  <div class="step" data-target="#ttr-list-part">
                    <a class="step-trigger btn" href="{{ route('list.transfer', $id) }}">
                      <span class="bs-stepper-circle">7</span>
                      <span class="bs-stepper-label">TTR List</span>
                    </a>
                  </div>

                  <div class="step" data-target="#discipline-part">
                    <a class="step-trigger btn" href="{{ route('list.disipline', $id) }}">
                      <span class="bs-stepper-circle">8</span>
                      <span class="bs-stepper-label">Discipline</span>
                    </a>
                  </div>

                  <div class="step" data-target="#resigned-part">
                    <a class="step-trigger btn" href="{{ route('list.resigned', $id) }}">
                      <span class="bs-stepper-circle">9</span>
                      <span class="bs-stepper-label">Resigned</span>
                    </a>
                  </div>
                </div>

                <div class="bs-stepper-content">

                  <form method="POST" action="{{ route('employee.update.service') }}" id="employeeForm" enctype="multipart/form-data">
                    @csrf
                    <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="row">

                        <input type="hidden" name="id" id="id" value="{{ $employee_info->id }}" />

                        <div class="col-md-4">

                          <div class="form-group">
                            <label for="name">Company<span>*</span></label>
                            <select class="form-control" name="company" id="company" >
                              <option value="">Select Company</option>
                              @foreach ($company_info as $company)
                              <option value="{{ $company->id }}" {{ $employee_info->salary_unit ==  $company->id?  'selected': ''}} >{{ $company->name }}</option>
                              @endforeach
                            </select>
                           
                          </div>
                          <div class="form-group">
                            <label for="name">Salary Unit<span>*</span></label>
                            <select class="form-control" name="salary" id="salary">
                            <option value="">Select Salary Unit</option>
                              @foreach ($company_info as $company)
                              <option value="{{ $company->id }}" {{ $employee_info->company ==  $company->id?  'selected': ''}} >{{ $company->name }}</option>
                              @endforeach
                            </select>
                           
                          </div>
                          <div class="form-group">
                            <label for="name">Department<span>*</span></label>
                            <select class="form-control" name="department" id="department">
                              <option value="">Select Department</option>
                              @foreach ($department_info as $department)
                              <option value="{{ $department->id }}" {{ $employee_info->department ==  $department->id?  'selected': ''}} >{{ $department->dept_name }}</option>
            
                              @endforeach

                            </select>
                          
                          </div>

                          <div class="form-group">
                            <label for="name">employee Id<span>*</span></label>
                            <input type="text" autocomplete="off" class="form-control" id="employee_id" name="employee_id" value="{{ $employee_info->employeeId  }}">
                          
                          </div>

                          <div class="form-group">
                            <label for="name">Section</label>
                            <select class="form-control " name="section" id="section">
                              <option value="">Select Section</option>
                              @foreach ($section_info as $section)
                              <option value="{{ $section->id }}" {{ $employee_info->section ==  $section->id?  'selected': ''}} >{{ $section->section_name }}</option>
                              @endforeach
                            </select>

                          </div>
                          <div class="form-group">
                            <label for="name">Sub Section</label>
                            <select class="form-control" name="sub_section" id="sub_section">
                              <option>Select Sub Section</option>
                              @foreach ($subsection_info as $subsection)
                              <option value="{{ $subsection->id }}" {{ $employee_info->sub_section ==  $subsection->id?  'selected': ''}} >{{ $subsection->name }}</option>
                              @endforeach
                            </select>

                          </div>
                          <div class="form-group">
                            <label for="name">Designation<span>*</span></label>
                            <select class="form-control" name="designation" id="designation">
                              <option value="">Select Designation</option>
                              @foreach ($designation_info as $designation)
                              <option value="{{ $designation->id }}" {{ $employee_info->designation ==  $designation->id?  'selected': ''}} >{{ $designation->desig_name }}</option>
                              @endforeach
                              
                            </select>

                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Category<span>*</span></label>
                            <select class="form-control" name="category" id="category">
                              <option value="">Select Category</option>
                              <option <?php if ($employee_info->e_category == "Ofice staf") echo 'selected'; ?> value="Ofice staf">Ofice staf</option>
                              <option <?php if ($employee_info->e_category == "Worker") echo 'selected'; ?> value="Worker">Worker</option>
                  
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="name">Worker Type<span>*</span></label>
                            <select class="form-control" name="worker_type" id="workertype" >
                              <option value="">Select Worker Type</option>
                              <option <?php if ($employee_info->workerType == "Employee") echo 'selected'; ?> value="Employee">Employee</option>
                              <option <?php if ($employee_info->workerType == "None Employee") echo 'selected'; ?> value="None Employee">None Employee</option>
                            
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="name">Shift</label>
                            <select class="form-control" name="Shift" id="Shift">
                              <option value="">Select Shift</option>
                              @foreach ($shift_info  as $shift)
                              <option value="{{ $shift->id }}" {{ $employee_info->shift ==  $shift->id?  'selected': ''}} >{{ $shift->shift }}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Join Date<span>*</span></label>
                            <input class="form-control" type="date" name="join_date" id="join_date" value="{{ $employee_info->joinDate  }}" />
                          </div>
                          <div class="form-group">
                            <label for="name">Activation Date<span>*</span></label>
                            <input class="form-control" type="date" name="activation_date" id="activation_date" value="{{ $employee_info->activationDate  }}" />
                          </div>

                          <div class="mb-3">
                            <label for="formFile" class="form-label">Resume</label>
                            <input class="form-control" type="file" name="resume" id="resume" value="{{ $employee_info->resume  }}"/>
                            <p>{{ $employee_info->resume  }}</p>
                          </div>

                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Weekend<span>*</span></label>
                            <select class="form-control" name="weekend" id="weekend">
                              <option value="">Select Weekend</option>
                              <option <?php if ($employee_info->weekend == "Saturday") echo 'selected'; ?> value="Saturday">Saturday</option>
                              <option <?php if ($employee_info->weekend == "Sunday") echo 'selected'; ?> value="Sunday">Sunday</option>
                              <option <?php if ($employee_info->weekend == "Monday") echo 'selected'; ?> value="Monday">Monday</option>
                              <option <?php if ($employee_info->weekend == "Tuesday") echo 'selected'; ?> value="Tuesday">Tuesday</option>
                              <option <?php if ($employee_info->weekend == "Wednesday") echo 'selected'; ?> value="Wednesday">Wednesday</option>
                              <option <?php if ($employee_info->weekend == "Thursday") echo 'selected'; ?> value="Thursday">Thursday</option>
                              <option <?php if ($employee_info->weekend == "Friday") echo 'selected'; ?> value="Friday">Friday</option>
                              
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="confirmation">Confirmation</label>
                            <input type="text" class="form-control" id="confirmation" name="confirmation" value="{{ $employee_info->confirmation  }}">
                          </div>

                          <div class="form-group">
                            <label for="tin">Tin No</label>
                            <input type="text" class="form-control" id="tin" name="tin" value="{{ $employee_info->tin_no  }}">
                          </div>

                          <div class="form-group">
                            <label for="pabx">PABX</label>
                            <input type="text" class="form-control" id="pabx" name="pabx" value="{{ $employee_info->pabx  }}">
                          </div>
                          <div class="form-group">
                            <label for="punchid">Punch ID <span>*</span></label>
                            <input type="text" class="form-control" id="punch_id" name="punch_id" value="{{ $employee_info->punch_id  }}" >
                          </div>
                          <div class="form-group">
                            <label for="one_punch">One Punch</label>
                            <select class="form-control" name="one_punch">
                              <option value="">Select Weekend</option>
                              <option <?php if ($employee_info->one_punch == "Yes") echo 'selected'; ?> value="Yes">Yes</option>
                              <option <?php if ($employee_info->one_punch == "No") echo 'selected'; ?> value="No">No</option>
                              
                            </select>
                          </div>

                        </div>


                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">
                              <a href="{{ route('employee.create') }}" class="btn btn-primary">Go list</a>&nbsp;
                              <button type="submit" class="btn btn-success">Update & Next</button>
                            </div>
                            <div class="col-md-6 text-right">
                              <!-- <button type="submit" class="btn btn-success">Next</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>


    </div>
    <!-- /.card -->
  </div>
</div>




</div>


</div>
<!-- /.row -->


<!-- /.row -->
</div>
<!-- /.container-fluid -->


@endsection