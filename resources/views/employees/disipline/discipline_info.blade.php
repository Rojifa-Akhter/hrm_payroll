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

                  <div class="step active" data-target="#discipline-part">
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
                  <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#discipline-info">
                    Add discipline
                  </button>
                  <div class="modal fade" id="discipline-info">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Info Discipline</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('store.disipline') }}" id="employeeForm">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="id" value="{{ $id }}" />
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label for="name">Discipline Type</label>
                                    <input type="text" autocomplete="off" class="form-control" id="type" name="type" placeholder="discipline type">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Refference Number</label>
                                    <input type="text" autocomplete="off" class="form-control" id="ref_number" name="ref_number" placeholder="refference number">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Date</label>
                                    <input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder="Enter Dis date">
                                  </div>

                                </div>
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label for="name">Reason</label>
                                    <textarea type="text" autocomplete="off" rows="8" cols="1" class="form-control" id="reason" name="reason" placeholder="Enter Dis Reason"></textarea>
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

                  <div class="modal fade" id="discipline_edit">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Discipline</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('update.disiplines') }}" id="employeeForm">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="dis_id" value=" " />
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label for="name">Discipline Type</label>
                                    <input type="text" autocomplete="off" class="form-control" id="edit_type" name="type" placeholder="discipline type">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Refference Number</label>
                                    <input type="text" autocomplete="off" class="form-control" id="edit_ref_number" name="ref_number" placeholder="refference number">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Date</label>
                                    <input type="date" autocomplete="off" class="form-control" id="edit_date" name="date" placeholder="Enter Dis date">
                                  </div>

                                </div>
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label for="name">Reason</label>
                                    <textarea type="text" autocomplete="off" rows="8" cols="1" class="form-control" id="edit_reason" name="reason" placeholder="Enter Dis Reason"></textarea>
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
                      if (!empty($disciplines_info)) {
                        foreach ($disciplines_info as $disipline) {
                      ?>

                          <tr>
                            <td>{{ $disipline->id }}</td>
                            <td>{{ $disipline->employeeId }}</td>
                            <td>{{ $disipline->type }}</td>
                            <td>{{ $disipline->ref_number }}</td>
                            <td>{{ $disipline->date }}</td>
                            <td>{{ $disipline->reason }}</td>

                            <td>
                           
                              <button type="button"  class="btn  btn-sm btn-success" data-toggle="modal" data-target="#discipline_edit" onclick="editDisipline(<?php echo  $disipline->id ?>);">Edit</button>
                              <a href="{{route('disipline.delete', $disipline->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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