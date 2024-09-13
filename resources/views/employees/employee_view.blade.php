@extends('layouts.app')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Employee Information ID: {{ $id }}</h1>
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
  <div class="row">
    <div class="col-md-12">
      <!-- Widget: user widget style 1 -->
      <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-info">
          <h3 class="widget-user-username">{{ $employee_view->name }}</h3>
          <h5 class="widget-user-desc">{{ $employees['0']['desig_name'] }}</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle elevation-2" style="width: 100px; height:100px;" src="{{ asset('storage/app/'.$employees[0]['photo']) }}" alt="User Avatar">
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-blocks">
                <small class="perfv"><strong>Employee Name:</strong><span>:</span>&nbsp;{{ $employee_view->name }}</small></br>
                <small class="perfv"><strong>Father Name:</strong><span>:</span>&nbsp;{{ $employees['0']['fatherName'] }}</small></br>
                <small class="perfv"><strong>Mother Name:</strong><span>:</span>&nbsp;{{ $employees['0']['motherName'] }}</small></br>
                <small class="perfv"><strong>Birth Date:</strong><span>:</span>&nbsp;{{ $employees['0']['dob'] }}</small></br>
                <small class="perfv"><strong>Blood Group:</strong><span>:</span>&nbsp;{{ $employees['0']['bloodGroup'] }}</small></br>

              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-blocks">
                <small class="perfv"><strong>Gender:</strong><span>:</span>&nbsp;{{ $employees['0']['gender'] }}</small></br>
                <small class="perfv"><strong>Marital Status:</strong><span>:</span>&nbsp;{{ $employees['0']['maritial_status'] }}</small></br>
                <small class="perfv"><strong>Religion:</strong><span>:</span>&nbsp;{{ $employees['0']['religion'] }}</small></br>
                <small class="perfv"><strong>Nationality:</strong><span>:</span>&nbsp;{{ $employees['0']['nationality'] }}</small></br>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
              <div class="description-blocks">
                <small class="perfv"><strong>NID Number:</strong><span>:</span>&nbsp;{{ $employees['0']['voterId'] }}</small></br>
                <small class="perfv"><strong>NID Image:</strong><span>:</span>&nbsp;<img style="width: 100px; height:30px;" src="{{ asset('storage/app/'.$employees[0]['voterImage']) }}" alt="User Avatar"></small></br>
                <small class="perfv"><strong>Present Address:</strong><span>:</span>&nbsp;{{ $employees['0']['presentAddress'] }}</small></br>
                <small class="perfv"><strong>Permanent Address:</strong><span>:</span>&nbsp;{{ $employees['0']['permanentAddress'] }}</small></br>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
    <!-- /.card -->

    <div class="col-md-12">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Service Information</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">

          <div class="row">
            <div class="col-sm-4">
              <div class="position-relative p-3 bg-light" style="height: 180px">
                <div class="ribbon-wrapper ribbon-lg">
                  <div class="ribbon bg-info">
                    Service
                  </div>
                </div>
                <small class="perfv"><strong>Company</strong><span>:</span>&nbsp;{{ $employees['0']['com_name'] }}</small></br>
                <small class="perfv"><strong>Salary Unit</strong><span>:</span>&nbsp;{{ $employees['0']['com_name'] }}</small></br>
                <small class="perfv"><strong>Department</strong><span>:</span>&nbsp;{{ $employees['0']['dept_name'] }}</small></br>
                <small class="perfv"><strong>employ.Id.card</strong><span>:</span>&nbsp;{{ $employees['0']['employeeId'] }}</small></br>
                <small class="perfv"><strong>Section</strong><span>:</span>&nbsp;{{ $employees['0']['section_name'] }}</small></br>
                <small class="perfv"><strong>Sub Section</strong><span>:</span>&nbsp;{{ $employees['0']['name'] }}</small></br>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="position-relative p-3 bg-light" style="height: 180px">
                <div class="ribbon-wrapper ribbon-lg">
                  <div class="ribbon bg-info">
                    Service
                  </div>
                </div>
                <small class="perfv"><strong>Designation</strong><span>:</span>&nbsp;{{ $employees['0']['desig_name'] }}</small></br>
                <small class="perfv"><strong>Category</strong><span>:</span>&nbsp;{{ $employees['0']['e_category'] }}</small></br>
                <small class="perfv"><strong>Worker Type</strong><span>:</span>&nbsp;{{ $employees['0']['workerType'] }}</small></br>
                <small class="perfv"><strong>Shift</strong><span>:</span>&nbsp;{{ $employees['0']['shift'] }}</small></br>
                <small class="perfv"><strong>Join Date</strong><span>:</span>&nbsp;{{ $employees['0']['joinDate'] }}</small></br>
                <small class="perfv"><strong>Activation Date</strong><span>:</span>&nbsp;{{ $employees['0']['activationDate'] }}</small></br>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="position-relative p-3 bg-light" style="height: 180px">
                <div class="ribbon-wrapper ribbon-lg">
                  <div class="ribbon bg-info">
                    Service
                  </div>
                </div>
                <small class="perfv"><strong>Weekend</strong><span>:</span>&nbsp;{{ $employees['0']['weekend'] }}</small></br>
                <small class="perfv"><strong>Confirmation</strong> <span>:</span>&nbsp;{{ $employees['0']['confirmation'] }}</small></br>
                <small class="perfv"><strong>Tin No</strong><span>:</span>&nbsp;{{ $employees['0']['tin_no'] }}</small></br>
                <small class="perfv"><strong>PABX</strong><span>:</span>&nbsp;{{ $employees['0']['pabx'] }}</small></br>
                <small class="perfv"><strong>Punch ID</strong><span>:</span>&nbsp;{{ $employees['0']['punch_id'] }}</small></br>
                <small class="perfv"><strong>One Punch</strong><span>:</span>&nbsp;{{ $employees['0']['one_punch'] }}</small></br>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-md-4">
      <div class="card card-gray">
        <div class="card-header">
          <h3 class="card-title">Contact</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <small class="perfv"><strong>Office Phone</strong><span>:</span>&nbsp;{{ $employees['0']['office_phone'] }}</small></br>
          <small class="perfv"><strong>Office1(TNT)</strong><span>:</span>&nbsp;{{ $employees['0']['office_tnt1'] }}</small></br>
          <small class="perfv"><strong>Office2(TNT)</strong><span>:</span>&nbsp;{{ $employees['0']['office_tnt2'] }}</small></br>
          <small class="perfv"><strong>Personal Phone</strong><span>:</span>&nbsp;{{ $employees['0']['phone'] }}</small></br>
          <small class="perfv"><strong>Home Phone</strong><span>:</span>&nbsp;{{ $employees['0']['home_phone'] }}</small></br>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <!-- /.col -->
    <div class="col-md-8">
      <div class="card card-gray">
        <div class="card-header">
          <h3 class="card-title">Resigned Info</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Resigned name</th>
                <th>Resigned Date</th>
                <th>Resigned Reason</th>
              </tr>
            </thead>
            <tbody>
             
                  <tr>
                    <td>{{ $employees['0']['status'] }}</td>
                    <td>{{ $employees['0']['resign_date'] }}</td>
                    <td>{{ $employees['0']['reason'] }}</td>
                  </tr>
            
              </tfoot>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-md-12">
      <div class="card card-gray">
        <div class="card-header">
          <h3 class="card-title">Academic</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Exam Title</th>
                <th>Result</th>
                <th>Institute</th>
                <th>Passing Year</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($academic_info)) {
                foreach ($academic_info as $academic) {  ?>
                  <tr>
                    <td>{{ $academic->exam_title }}</td>
                    <td>{{ $academic->result }}</td>
                    <td>{{ $academic->institute }}</td>
                    <td>{{ $academic->passing_year }}</td>
                  </tr>
              <?php
                }
              } ?>
              </tfoot>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-gray">
          <div class="card-header">
            <h3 class="card-title">Material</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Materials Name</th>
                  <th>Qty</th>
                  <th>Issue Date</th>
                  <th>Warranty</th>
                  <th>Price</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($materials_info)) {
                  foreach ($materials_info as $material) {  ?>
                    <tr>
                    <tr>
                      <td>{{ $material->material_name }}</td>
                      <td>{{ $material->price }}</td>
                      <td>{{ $material->qty }}</td>
                      <td>{{ $material->issueDate }}</td>
                      <td>{{ $material->warranty }}</td>
                      <td>{{ $material->description }}</td>
                    </tr>
                <?php
                  }
                } ?>
                </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-gray">
          <div class="card-header">
            <h3 class="card-title">Performance Information</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <div class="row">
              <div class="col-sm-12">
                <?php
                if (!empty($performances_info)) {
                  foreach ($performances_info as $performance) {  ?>
                    <div class="position-relative p-3 bg-light mt-2" style="height: 180px">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-info">
                          Performance
                        </div>
                      </div>
                      <div class="row perfi">
                        <div class="col-md-3">
                          <small class="perfv"><strong>Year</strong> <span>:</span>{{ $a = $performance->year }}</small></br>
                          <small class="perfv"><strong>Puntuality</strong> <span>:</span>{{ $b = $performance->puntuality }}</small></br>
                          <small class="perfv"><strong>Job knowledge</strong> <span>:</span>{{ $c = $performance->job_knowledge }}</small></br>
                          <small class="perfv"><strong>Initiative</strong> <span>:</span>{{ $d = $performance->initiative }}</small></br>
                          <input type="hidden" value="{{ $ab = $a +  $b + $c + $d }}" />
                          <small class="perfv"><strong>Sub Total=</strong> <span>:</span>&nbsp; <strong> {{ $ab }}</strong></small></br>
                        </div>
                        <div class="col-md-3">
                          <small class="perfv"><strong>Attendace</strong><span>:</span>{{ $e = $performance->attendace }}</small></br>
                          <small class="perfv"><strong>Qualification</strong><span>:</span>{{ $f = $performance->ednQualification }}</small></br>
                          <small class="perfv"><strong>Honesty</strong><span>:</span>{{ $g = $performance->honesty }}</small></br>
                          <small class="perfv"><strong>sincerity</strong><span>:</span>{{ $h = $performance->sincerity }}</small></br>
                          <input type="hidden" value="{{ $ac = $e +  $f + $g + $h }}" />
                          <small class="perfv"><strong>Sub Total=</strong> <span>:</span>&nbsp; <strong> {{ $ac }}</strong></small></br>
                        </div>
                        <div class="col-md-3">
                          <small class="perfv"><strong>Length Service</strong><span>:</span>{{ $i = $performance->lengthOfService }}</small></br>
                          <small class="perfv"><strong>customer Focus</strong><span>:</span>{{ $j = $performance->customerFocus }}</small></br>
                          <small class="perfv"><strong>Comm Skill</strong><span>:</span>{{ $k = $performance->CommSkill }}</small></br>
                          <small class="perfv"><strong>professionalis</strong><span>:</span>{{ $l = $performance->professionalism }}</small></br>
                          <input type="hidden" value="{{ $ad = $i +  $j + $k + $l }}" />
                          <small class="perfv"><strong>Sub Total=</strong> <span>:</span>&nbsp; <strong> {{ $ad }}</strong></small></br>
                        </div>
                        <div class="col-md-3">
                          <small class="perfv"><strong>Behaviour</strong><span>:</span>{{ $m = $performance->behaviour }}</small></br>
                          <small class="perfv"><strong>goal</strong><span>:</span>{{ $n =$performance->goal }}</small></br>
                          <small class="perfv"><strong>pdd</strong><span>:</span>{{ $o =$performance->pdd }}</small></br>
                          <small class="perfv"><strong></strong><span></span></small></br>
                          <input type="hidden" value="{{ $ae = $m +  $n + $o }}" />
                          <small class="perfv"><strong>Sub Total=</strong> <span>:</span>&nbsp; <strong>{{ $ae }}</strong></small></br>
                        </div>
                      </div>
                      <input type="hidden" value="{{ $rr = $ab +  $ac + $ad }}" />
                      <p><strong>All Total Mark</strong><span></span> <strong class="float-right">=&nbsp; {{ $rr }}</strong></p>
                    </div>
                <?php
                  }
                } ?>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-gray">
          <div class="card-header">
            <h3 class="card-title">Transfer</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Company</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th>Shift</th>
                  <th>Section</th>
                  <th>Reason</th>
                  <th>transfere Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($transfers_info)) {
                  foreach ($transfers_info as $transfer) {  ?>
                    <tr>
                      <td>{{ $transfer->name }}</td>
                      <td>{{ $transfer->dept_name }}</td>
                      <td>{{ $transfer->desig_name }}</td>
                      <td>{{ $transfer->shift }}</td>
                      <td>{{ $transfer->section_name }}</td>
                      <td>{{ $transfer->reason }}</td>
                      <td>{{ $transfer->date }}</td>
                    </tr>
                <?php
                  }
                } ?>
                </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-gray">
          <div class="card-header">
            <h3 class="card-title">Discipline</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Discipline Type</th>
                  <th>Refference Number</th>
                  <th>Date</th>
                  <th>Reason</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($disciplines_info)) {
                  foreach ($disciplines_info as $discipline) {  ?>
                    <tr>
                      <td>{{ $discipline->type }}</td>
                      <td>{{ $discipline->ref_number }}</td>
                      <td>{{ $discipline->date }}</td>
                      <td>{{ $discipline->reason }}</td>
                    </tr>
                <?php
                  }
                } ?>
                </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->



    </div>



    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  @endsection