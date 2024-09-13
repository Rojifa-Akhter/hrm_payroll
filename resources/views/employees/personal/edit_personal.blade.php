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
              <h3 class="card-title">bs-stepper</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper1">
                <div class="bs-stepper-header">
                  <!-- your steps here -->
                  <div class="step" data-target="#service-part">
                    <a class="step-trigger btn " href="{{ route('employee.edit.service', $id) }}">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Service</span>
                    </a>
                  </div>



                  <div class="step active" data-target="#personal-part">
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



                  <form method="post" action="{{ route('employee.update.personal') }}" id="employeeForm" enctype="multipart/form-data">
                    @csrf
                    <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="row">

                        <input type="hidden" name="employee" value="{{ '$id' }}" />
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Full Name<span>*</span></label>

                            <input type="text" autocomplete="off" class="form-control" id="fullName" name="full_name" value="{{ $employee->name }}" placeholder="Enter Full Name">
                          </div>
                          <div class="form-group">
                            <label for="name">Father Name</label>
                            <input type="text" autocomplete="off" class="form-control" id="fatherName " name="father_name" value="{{ $employee->fatherName }}" placeholder="Enter Father Name">
                          </div>
                          <div class="form-group">
                            <label for="name">Mother Name</label>
                            <input type="text" autocomplete="off" class="form-control" id="motherName" name="mother_name" value="{{ $employee->motherName }}" placeholder="Enter Mother Name">
                          </div>
                          <div class="form-group">
                            <label for="name">Birth Date<span>*</span></label>

                            <input class="form-control" type="date" name="birth_date" id="birth_date" value="{{ $employee->dob }}" />


                          </div>
                          <div class="form-group">
                            <label for="name">Blood Group</label>
                            <select class="form-control" name="bloodgroup" id="bloodgroup">
                              <option value="">Select Blood group</option>
                              <option <?php if ($employee->bloodGroup == "A+") echo 'selected'; ?> value="A+">A+</option>
                              <option <?php if ($employee->bloodGroup == "A-") echo 'selected'; ?> value="A-">A-</option>
                              <option <?php if ($employee->bloodGroup == "B+") echo 'selected'; ?> value="B+">B+</option>
                              <option <?php if ($employee->bloodGroup == "B-") echo 'selected'; ?> value="B-">B-</option>
                              <option <?php if ($employee->bloodGroup == "AB+") echo 'selected'; ?> value="AB+">AB+</option>
                              <option <?php if ($employee->bloodGroup == "AB-") echo 'selected'; ?> value="AB-">AB-</option>
                              <option <?php if ($employee->bloodGroup == "O+") echo 'selected'; ?> value="O+">O+</option>
                              <option <?php if ($employee->bloodGroup == "O-") echo 'selected'; ?> value="O-">O-</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Gender<span>*</span></label>
                            <select class="form-control" name="gender" id="gender">
                              <option value="">Select Gender</option>
                              <option <?php if ($employee->gender == "Male") echo 'selected'; ?> value="Male">Male</option>
                              <option <?php if ($employee->gender == "Female") echo 'selected'; ?> value="Female">Female</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="name">Marital Status<span>*</span></label>
                            <select class="form-control" name="maritalSt" id="maritalSt">
                              <option value="">Select Marital Status</option>
                              <option <?php if ($employee->maritial_status == "Devorced") echo 'selected'; ?> value="Devorced">Devorced</option>
                              <option <?php if ($employee->maritial_status == "Married") echo 'selected'; ?> value="Married">Married</option>
                              <option <?php if ($employee->maritial_status == "Single") echo 'selected'; ?> value="Single">Single</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="name">Present Address<span>*</span></label>
                            <textarea type="text" autocomplete="off" class="form-control" id="present_add" name="present_add" placeholder="Enter present address">{{ $employee->presentAddress  }}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="name">Permanent Address<span>*</span></label>
                            <textarea type="text" autocomplete="off" class="form-control" id="permanent_add" name="permanent_add" placeholder="Enter Permanent Address">{{ $employee->permanentAddress }}</textarea>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="formFile" class="form-label"> Uplad Photo</label>
                            <input class="form-control" type="file" id="em_photo" name="em_photo">
                          </div>
                          <div class="form-group">
                            <label for="name">NI Id</label>
                            <input type="text" autocomplete="off" class="form-control" id="niId" name="niId" value="{{ $employee->voterId  }}" placeholder="Enter Voter Id">
                          </div>
                          <div class="form-group">
                            <label for="formFile" class="form-label">NI Image</label>
                            <input class="form-control" type="file" id="ni_image" name="ni_image">
                          </div>
                          <div class="form-group">
                            <label for="name">Nationality<span>*</span></label>
                            <select class="form-control" name="nationality" id="nationality">
                              <option value="">Select Nationality</option>
                              <option value="Bangladesh">Bangladesh</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Religion<span>*</span></label>
                            <select class="form-control" name="religion" id="religion">
                              <option value="">Select Religion</option>
                              <option <?php if ($employee->religion == "Islam") echo 'selected'; ?> value="Islam">Islam</option>
                              <option <?php if ($employee->religion == "Hindu") echo 'selected'; ?> value="Hindu">Hindu</option>
                              <option <?php if ($employee->religion == "Buddha") echo 'selected'; ?> value="Buddha">Buddha</option>
                              <option <?php if ($employee->religion == "Christian") echo 'selected'; ?> value="Christian">Christian</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">
                              <a href="" class="btn btn-primary">Previous</a>&nbsp;
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            <div class="col-md-6 text-right">
                              <button type="submit" class="btn btn-success">Next</button>
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