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
              <h3 class="card-title">Add Employee Service</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper1">
                <div class="bs-stepper-header">
                  <!-- your steps here -->
                  <div class="step active" data-target="#service-part">
                    <a class="step-trigger btn " href="{{ url('employee/add') }}">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Service</span>
                    </a>
                  </div>
                </div>
                <div class="bs-stepper-content">

                  <form method="post" action="{{ route('employee.store.service') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                    <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="row">

                        <input type="hidden" name="id" id="id" value="{{ $id }}" />

                        <div class="col-md-4">

                          <div class="form-group">
                            <label for="name">Company<span>*</span></label>
                            <select class="form-control @error('company') is-invalid @enderror" name="company" id="company" value="{{ old('company') }}">
                              <option  value="">Select Company</option>
                              @foreach ($company_info as $company)
                              <option value="{{ $company->id }}">{{ $company->name }}</option>
                              @endforeach
                            </select>
                            <!-- @error('company')
                            <div class="alert text-danger">{{ $message }}</div>
                            @enderror -->
                          </div>
                          <div class="form-group">
                            <label for="name">Salary Unit</label>
                            <select class="form-control" name="salary" id="salary">
                              <option value="">Select Salary Unit</option>
                              @foreach ($company_info as $company)
                              <option value="{{ $company->id }}">{{ $company->name }}</option>
                              @endforeach
                            </select>

                          </div>
                          <div class="form-group">
                            <label for="name">Department<span>*</span></label>
                            <select class="form-control @error('department') is-invalid @enderror" name="department" id="department" value="{{ old('department') }}">
                              <option value="">Select Department</option>
                              @foreach ($department_info as $department)
                              <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="name">employee Id<span>*</span></label>
                            <input type="text" autocomplete="off" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" value="{{ old('employee_id') }}" placeholder="Enter employee Id">
                          </div>

                          <div class="form-group">
                            <label for="name">Section<span>*</span></label>
                            <select class="form-control" name="section" id="ser_section" value="{{ old('section') }}">
                              <option value="">Select Section</option>
                              @foreach ($section_info as $section)
                              <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Sub Section <span>*</span></label>
                            <select class="form-control" name="sub_section" id="ser_sub_section" value="{{ old('sub_section') }}">
                              <option value="">Select Sub Section</option>
                              @foreach ($subsection_info as $subsection)
                              <option id="{{ $subsection->section }}" value="{{ $subsection->id }}">{{ $subsection->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Designation</label>
                            <select class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation">
                              <option value="">Select Designation</option>
                              @foreach ($designation_info as $designation)
                              <option value="{{ $designation->id }}">{{ $designation->desig_name }}</option>
                              @endforeach

                            </select>

                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Category</label>
                            <select class="form-control" name="category" id="category">
                              <option value="">Select Category</option>
                              <option value="Category">Category</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="name">Worker Type</label>
                            <select class="form-control" name="worker_type" id="workertype">
                              <option value="">Select Worker Type</option>
                              <option value="Worker Type">Worker Type</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Rank</label>
                            <select class="form-control" name="rank" id="rank">
                              <option value="">Select Rank</option>
                              <option value="1">Rank</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Shift</label>
                            <select class="form-control" name="Shift" id="Shift">
                              <option value="">Select Shift</option>shifts
                              @foreach ($shift_info as $shift)
                              <option value="{{ $shift->id }}">{{ $shift->shift }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Join Date</label>
                            <input class="form-control" type="date" name="join_date" id="join_date" />
                          </div>
                          <div class="form-group">
                            <label for="name">Activation Date</label>
                            <input class="form-control" type="date" name="activation_date" id="activation_date" />
                          </div>

                          <div class="mb-3">
                            <label for="formFile" class="form-label">Resume</label>
                            <input class="form-control" type="file" name="resume" id="resume">
                          </div>

                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Weekend</label>
                            <select class="form-control" name="weekend" id="weekend">
                              <option value="">Select Weekend</option>
                              <option value="Saturday">Saturday</option>
                              <option value="Sunday">Sunday</option>
                              <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                              <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                              <option value="Friday">Friday</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="confirmation">Confirmation</label>
                            <input type="text" class="form-control" id="confirmation" name="confirmation" placeholder="Enter confirmation">
                          </div>

                          <div class="form-group">
                            <label for="tin">Tin No</label>
                            <input type="text" class="form-control" id="tin" name="tin" placeholder="Enter tin">
                          </div>

                          <div class="form-group">
                            <label for="pabx">PABX</label>
                            <input type="text" class="form-control" id="pabx" name="pabx" placeholder="Enter PABX">
                          </div>
                          <div class="form-group">
                            <label for="punchid">Punch ID </label>
                            <input type="text" class="form-control" id="punch_id" name="punch_id" placeholder="Enter punch id">
                          </div>
                          <div class="form-group">
                            <label for="one_punch">One Punch</label>
                            <select class="form-control" name="one_punch">
                              <option value="">Select Weekend</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>

                        </div>


                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">

                              <button type="submit" class="btn btn-primary">Submit & Next</button>
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