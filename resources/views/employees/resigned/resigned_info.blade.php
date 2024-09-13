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
              <h3 class="card-title">Resigned Info</h3>
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

                  <div class="step" data-target="#discipline-part">
                    <a class="step-trigger btn" href="{{ route('list.disipline', $id) }}">
                      <span class="bs-stepper-circle">8</span>
                      <span class="bs-stepper-label">Discipline</span>
                    </a>
                  </div>

                  <div class="step active" data-target="#resigned-part">
                    <a class="step-trigger btn" href="{{ route('list.resigned', $id) }}">
                      <span class="bs-stepper-circle">9</span>
                      <span class="bs-stepper-label">Resigned</span>
                    </a>
                  </div>
                </div>


                <div class="bs-stepper-content">

                  <!-- /.Edit modal Start-->


                  <form method="post" action="{{ route('update.resigneds') }}" id="employeeForm">
                    @csrf
                    <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                      <div class="row">
                        <input type="hidden" name="id" id="id" value="{{ $employee->id }}" />
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">Resigned name</label>
                            <select class="form-control" name="resignedType" id="edit_resignedType">
                              <option value="">Enter Resigned</option>
                              <option <?php if ($employee->status == "Resigned") echo 'selected'; ?> value="Resigned">Resigned</option>
                              <option <?php if ($employee->status == "Terminated") echo 'selected'; ?> value="Terminated">Terminated</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Resigned Date</label>
                            <input type="date" autocomplete="off" class="form-control" id="edit_res_date" name="res_date" value="{{ $employee->resign_date }}"  placeholder="Enter Resigned Date">
                          </div>
                        </div>
                        <div class='col-md-6'>
                        <div class="form-group">
                            <label for="name">Resigned Reason</label>
                            <textarea type="text" autocomplete="off" rows="5" cols="1" class="form-control" id="edit_resi_reason" name="resi_reason" value="{{ $employee->reason }}" placeholder="Enter Resigned Reason">{{ $employee->reason }}</textarea>
                          </div>
                        </div>
                        
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-6">
                              <a href="" class="btn btn-primary">Go List</a>&nbsp;
                              <button type="submit" class="btn btn-success">Update</button>
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