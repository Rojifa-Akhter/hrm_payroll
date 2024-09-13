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

                  <div class="step  active" data-target="#academic-part">
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
                  <!-- /.Add modal Start-->
                  <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modal-info">
                    Add Academic
                  </button>
                  <div class="modal fade" id="modal-info">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Info Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('employee.store.academic') }}" id="employeeForm" onsubmit="return validateForm()">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">


                                <div class="col-md-6">

                                  <input type="hidden" name="id" id="id" value="{{ $id }}" />

                                  <div class="form-group">
                                    <label for="name">Exam Title</label>

                                    <select class="form-control" name="exam_title" id="exam_title">
                                      <option value="">Enter Title</option>
                                      <option value="Masters/Post Graduation or Equivalent">Masters/Post Graduation or Equivalent</option>
                                      <option value="Graduation or Equivalent">Graduation or Equivalent</option>
                                      <option value="H.S.C (with Tech.) or Equivalent">H.S.C (with Tech.) or Equivalent</option>
                                      <option value="H.S.C or Equivalent">H.S.C or Equivalent</option>
                                      <option value="S.S.C or Equivalent">S.S.C or Equivalent</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Institute</label>
                                    <input type="text" autocomplete="off" class="form-control" id="institute" name="institute" placeholder="Enter Institute">
                                  </div>

                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Result</label>
                                    <input type="text" autocomplete="off" class="form-control" id="result" name="result" placeholder="Enter Result">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Passing Year</label>
                                    <input type="text" autocomplete="off" class="form-control" id="passing_year" name="passing_year" placeholder="Enter passing year">
                                  </div>

                                </div>

                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="" class="btn btn-primary">Go List</a>&nbsp;
                                      <button type="submit" class="btn btn-success">Submit &next</button>
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

                  <div class="modal fade" id="academic_edit">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Academic</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('employee.update.academic') }}" id="employeeForm">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                              <input type="hidden" name="id" id="ac_id" value="" />
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Exam Title</label>
                                    <select class="form-control" name="exam_title" id="edit_exam_title">
                                      <option value="">Enter Title</option>

                                      <option value="Masters/Post Graduation or Equivalent">Masters/Post Graduation or Equivalent</option>
                                      <option value="Graduation or Equivalent">Graduation or Equivalent</option>
                                      <option value="H.S.C (with Tech.) or Equivalent">H.S.C (with Tech.) or Equivalent</option>
                                      <option value="H.S.C or Equivalent">H.S.C or Equivalent</option>
                                      <option value="S.S.C or Equivalent">S.S.C or Equivalent</option>

                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Institute</label>
                                    <input type="text" autocomplete="off" class="form-control" id="edit_institute" name="institute" value="">
                                  </div>

                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Result</label>
                                    <input type="text" autocomplete="off" class="form-control" id="edit_result" name="result" value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Passing Year</label>
                                    <input type="text" autocomplete="off" class="form-control" id="edit_passing_year" name="passing_year" value="">
                                  </div>

                                </div>

                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="" class="btn btn-primary">Go List</a>&nbsp;
                                      <button type="submit" class="btn btn-success">Submit &next</button>
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
                        <th>Exam Title</th>
                        <th>Result</th>
                        <th>Institute</th>
                        <th>Passing Year</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (!empty($academic_info)) {
                        foreach ($academic_info as $academic) {  ?>
                          <tr>
                            <td>{{ $academic->id }}</td>
                            <td>{{ $academic->employeeId }}</td>
                            <td>{{ $academic->exam_title }}</td>
                            <td>{{ $academic->result }}</td>
                            <td>{{ $academic->institute }}</td>
                            <td>{{ $academic->passing_year }}</td>

                            <td>
                             <button type="button" id="academic_btn" class="btn  btn-sm btn-success" data-toggle="modal" data-target="#academic_edit" onclick="editAcademic(<?php echo  $academic->id ?>);">Edit</button>
                              <a href="{{route('employee.academic.delete', $academic->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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