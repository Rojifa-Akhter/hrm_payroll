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
              <h3 class="card-title">Employee Performance</h3>
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

                  <div class="step active" data-target="#performance-part">
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
                  <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#add_performances">
                    Add performances
                  </button>
                  <div class="modal fade" id="add_performances">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Insert performances</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('store.performances') }}" id="employeeForm">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="id" value="{{ $id }}" />
                                <div class="col-md-4">

                                  <div class="form-group">
                                    <label for="name">Year</label>
                                    <input type="text" class="form-control" id="year" name="year" placeholder="Year Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Puntuality</label>
                                    <input type="text" class="form-control" id="puntuality" name="puntuality" placeholder="puntuality Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Job knowledge</label>
                                    <input type="text" class="form-control" id="job_knowledge" name="job_knowledge" placeholder="job knowledge Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Initiative</label>
                                    <input type="text" class="form-control" id="initiative" name="initiative" placeholder="initiative Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Attendace</label>
                                    <input type="text" class="form-control" id="attendace" name="attendace" placeholder="attendace Mark">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                 
                                  <div class="form-group">
                                    <label for="name">Qualification</label>
                                    <input type="text" class="form-control" id="ednQualification" name="ednQualification" placeholder="Qualification Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Honesty</label>
                                    <input type="text" class="form-control" id="honesty" name="honesty" placeholder="honesty Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">sincerity</label>
                                    <input type="text" class="form-control" id="sincerity" name="sincerity" placeholder="Sincerity Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Length Service</label>
                                    <input type="text" class="form-control" id="lengthOfService" name="lengthOfService" placeholder="Service Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">customer Focus</label>
                                    <input type="text" class="form-control" id="customerFocus" name="customerFocus" placeholder="customer Focus Mark">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                 
                                  <div class="form-group">
                                    <label for="name">Comm Skill</label>
                                    <input type="text" class="form-control" id="CommSkill" name="CommSkill" placeholder="Comm Skill Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">professionalism</label>
                                    <input type="text" class="form-control" id="professionalism" name="professionalism" placeholder="professionalism Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Behaviour</label>
                                    <input type="text" class="form-control" id="behaviour" name="behaviour" placeholder="Behaviour Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">goal</label>
                                    <input type="text" class="form-control" id="goal" name="goal" placeholder="goal Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">pdd</label>
                                    <input type="text" class="form-control" id="pdd" name="pdd" placeholder="pdd Mark">
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

                  <div class="modal fade" id="performances_edit">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit performances</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="{{ route('update.performances') }}" id="employeeForm" >
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="per_id" value=" " />
                                <div class="col-md-4">

                                  <div class="form-group">
                                    <label for="name">Year</label>
                                    <input type="text" class="form-control" id="edit_year" name="year" placeholder="Year Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Puntuality</label>
                                    <input type="text" class="form-control" id="edit_puntuality" name="puntuality" placeholder="puntuality Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Job knowledge</label>
                                    <input type="text" class="form-control" id="edit_job_knowledge" name="job_knowledge" placeholder="job knowledge Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Initiative</label>
                                    <input type="text" class="form-control" id="edit_initiative" name="initiative" placeholder="initiative Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Attendace</label>
                                    <input type="text" class="form-control" id="edit_attendace" name="attendace" placeholder="attendace Mark">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                 
                                  <div class="form-group">
                                    <label for="name">Qualification</label>
                                    <input type="text" class="form-control" id="edit_ednQualification" name="ednQualification" placeholder="Qualification Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Honesty</label>
                                    <input type="text" class="form-control" id="edit_honesty" name="honesty" placeholder="honesty Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">sincerity</label>
                                    <input type="text" class="form-control" id="edit_sincerity" name="sincerity" placeholder="Sincerity Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Length Service</label>
                                    <input type="text" class="form-control" id="edit_lengthOfService" name="lengthOfService" placeholder="Service Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">customer Focus</label>
                                    <input type="text" class="form-control" id="edit_customerFocus" name="customerFocus" placeholder="customer Focus Mark">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                 
                                  <div class="form-group">
                                    <label for="name">Comm Skill</label>
                                    <input type="text" class="form-control" id="edit_CommSkill" name="CommSkill" placeholder="Comm Skill Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">professionalism</label>
                                    <input type="text" class="form-control" id="edit_professionalism" name="professionalism" placeholder="professionalism Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Behaviour</label>
                                    <input type="text" class="form-control" id="edit_behaviour" name="behaviour" placeholder="Behaviour Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">goal</label>
                                    <input type="text" class="form-control" id="edit_goal" name="goal" placeholder="goal Mark">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">pdd</label>
                                    <input type="text" class="form-control" id="edit_pdd" name="pdd" placeholder="pdd Mark">
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

                  <table id="example2" class="table table-bordered table-hover table-responsive">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>employeeId</th>
                        <th>Year</th>
                        <th>puntuality</th>
                        <th>job knowledge</th>
                        <th>Initiative</th>
                        <th>attendace</th>
                        <th>Qualification</th>
                        <th>honesty</th>
                        <th>sincerity</th>
                        <th>Service</th>
                        <th>customer Focus</th>
                        <th>Comm Skill</th>
                        <th>behaviour</th>
                        <th>goal</th>
                        <th>pdd</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if (!empty($performances_info)) {
                        foreach ($performances_info as $performance) {  ?>
                      <tr>
                        <td>{{ $performance->id }}</td>
                        <td>{{ $performance->employeeId }}</td>
                        <td>{{ $performance->year }}</td>
                        <td>{{ $performance->puntuality }}</td>
                        <td>{{ $performance->job_knowledge }}</td>
                        <td>{{ $performance->initiative }}</td>
                        <td>{{ $performance->attendace }}</td>
                        <td>{{ $performance->ednQualification }}</td>
                        <td>{{ $performance->honesty }}</td>
                        <td>{{ $performance->sincerity }}</td>
                        <td>{{ $performance->lengthOfService }}</td>
                        <td>{{ $performance->customerFocus }}</td>
                        <td>{{ $performance->CommSkill }}</td>
                        <td>{{ $performance->professionalism }}</td>
                        <td>{{ $performance->behaviour }}</td>
                        <td>{{ $performance->goal }}</td>
                        
                        <td>
                         
                          <button type="button" class="btn  btn-sm btn-success" data-toggle="modal" data-target="#performances_edit" 
                          onclick="editPerformance(<?php echo  $performance->id ?>);">Edit</button>
                          <a href="{{route('performance.delete', $performance->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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