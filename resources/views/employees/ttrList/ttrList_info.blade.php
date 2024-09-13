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
              <h3 class="card-title">Transfer Info</h3>
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



                  <div class="step" data-target="#personal-part">
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

                  <div class="step  " data-target="#academic-part">
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

                  <div class="step active" data-target="#ttr-list-part">
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
                  <!-- /.Add modal Start-->
                  <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#transfer-info">
                    Add transfer
                  </button>
                  <div class="modal fade" id="transfer-info">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Insert Transfer</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('store.ttrLists') }}" id="employeeForm">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="id" value="{{ $id }}" />
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Company<span>*</span></label>
                                    <select class="form-control" name="company" id="company">
                                      <option value="">Select Company</option>
                                      @foreach ($company_info as $company)
                                      <option value="{{ $company->id }}">{{ $company->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Department<span>*</span></label>
                                    <select class="form-control" name="department" id="department">
                                      <option value="">Select Department</option>
                                      @foreach ($department_info as $department)
                                      <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Designation<span>*</span></label>
                                    <select class="form-control" name="designation" id="designation">
                                      <option value="">Select Designation</option>
                                      @foreach ($designation_info as $designation)
                                      <option value="{{ $designation->id }}">{{ $designation->desig_name }}</option>
                                      @endforeach
                                      <option value="1">Designation</option>
                                    </select>

                                  </div>
                                  <div class="form-group">
                                    <label for="name">transfere Date</label>
                                    <input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder="Enter ttr date">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Shift</label>
                                    <select class="form-control" name="Shift" id="Shift">
                                      <option value="">Select Shift</option>
                                      @foreach ($shift_info as $shift)
                                      <option value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Section</label>
                                    <select class="form-control " name="section" id="section">
                                      <option value="">Select Section</option>
                                      @foreach ($section_info as $section)
                                      <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                      @endforeach
                                    </select>

                                  </div>
                                  <div class="form-group">
                                    <label for="name">Reason<span>*</span></label>
                                    <textarea type="text"  rows="5" cols="1" class="form-control" id="reason" name="reason" placeholder="Enter Reason"></textarea>
                                    
                                  </div>

                                </div>
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="" class="btn btn-warning">Go List</a>&nbsp;
                                      <button type="submit" class="btn btn-light">Submit</button>
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
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- /.Add modal End-->


                  <!-- /.Edit modal Start-->

                  <div class="modal fade" id="transfer_edit">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Transfer</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('update.transfers') }}" id="employeeForm">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="tra_id" value=" " />
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Company<span>*</span></label>
                                    <select class="form-control" name="company" id="edit_company">
                                      <option value="">Select Company</option>
                                      @foreach ($company_info as $company)
                                      <option value="{{ $company->id }}">{{ $company->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Department<span>*</span></label>
                                    <select class="form-control" name="department" id="edit_department">
                                      <option value="">Select Department</option>
                                      @foreach ($department_info as $department)
                                      <option value="{{ $department->id }}">{{ $department->dept_name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Designation<span>*</span></label>
                                    <select class="form-control" name="designation" id="edit_designation">
                                      <option value="">Select Designation</option>
                                      @foreach ($designation_info as $designation)
                                      <option value="{{ $designation->id }}">{{ $designation->desig_name }}</option>
                                      @endforeach
                                      <option value="1">Designation</option>
                                    </select>

                                  </div>
                                  <div class="form-group">
                                    <label for="name">transfere Date</label>
                                    <input type="date" autocomplete="off" class="form-control" id="edit_date" name="date" placeholder="Enter ttr date">
                                  </div>


                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Shift</label>
                                    <select class="form-control" name="Shift" id="edit_Shift">
                                      <option value="">Select Shift</option>
                                      @foreach ($shift_info as $shift)
                                      <option value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Section</label>
                                    <select class="form-control " name="section" id="edit_section">
                                      <option value="">Select Section</option>
                                      @foreach ($section_info as $section)
                                      <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                      @endforeach
                                    </select>

                                  </div>
                                  <div class="form-group">
                                    <label for="name">Reason<span>*</span></label>
                                    <textarea type="text"  rows="5" cols="1" class="form-control" id="edit_reason" name="reason" placeholder="Enter Reason"></textarea>
                                    
                                  </div>



                                </div>
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="" class="btn btn-danger">Go List</a>&nbsp;
                                      <button type="submit" class="btn btn-light">Update</button>
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
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- /.Edit modal End-->

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Empl Id</th>
                        <th>company</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Shift</th>
                        <th>section_name</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (!empty($transfers_info)) {
                        foreach ($transfers_info as $transfer) {  ?>
                          <tr>
                            <td>{{ $transfer->id }}</td>
                            <td>{{ $transfer->ttr_id }}</td>
                            <td>{{ $transfer->name }}</td>
                            <td>{{ $transfer->dept_name }}</td>
                            <td>{{ $transfer->desig_name }}</td>
                            <td>{{ $transfer->shift }}</td>
                            <td>{{ $transfer->section_name }}</td>
                            <td>{{ $transfer->reason }}</td>
                            <td>{{ $transfer->date }}</td>
                            

                            <td>
                              <a href="#"><button type="button" class="btn  btn-sm btn-success" data-toggle="modal" data-target="#transfer_edit" onclick="editTransfersl(<?php echo  $transfer->id ?>);">Edit</button></a>
                              <a href="{{route('transfer.delete', $transfer->id )}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
                            </td>
                          </tr>

                      <?php
                        }
                      } ?>
                      </tfoot>
                  </table>


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