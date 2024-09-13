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

                                    <div class="step  active" data-target="#contact-part">
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

                                    <form method="post" action="{{ route('update.contact') }}" id="employeeForm" onsubmit="return validateForm()" enctype="multipart/form-data">
                                        @csrf
                                        <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                            <div class="row">



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Office Phone</label>
                                                        <input type="hidden" name="id" id="id" value="{{ $employee->id }}" />
                                                        <input type="number" autocomplete="off" class="form-control" id="office_phone" name="office_phone" value="{{ $employee->office_phone }}" placeholder="Enter Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Office(TNT) </label>
                                                        <input type="number" autocomplete="off" class="form-control" id="Office_tnt" name="Office_tnt" placeholder="Enter TNT Number" value="{{ $employee->office_tnt1 }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Office2(TNT) </label>
                                                        <input type="number" autocomplete="off" class="form-control" id="Office2_tnt" name="Office2_tnt" placeholder="Enter TNT2 Number" value="{{ $employee->office_tnt2 }}">
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Personal Phone</label>
                                                        <input type="number" autocomplete="off" class="form-control" id="personal_Phone" name="personal_Phone" placeholder="personal Phone Number" value="{{ $employee->phone }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Home Phone/Emergency Phone </label>
                                                        <input type="number" autocomplete="off" class="form-control" id="home_phone" name="home_phone" placeholder="Enter home phone" value="{{ $employee->home_phone }}">
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="" class="btn btn-primary">Go List</a>&nbsp;
                                                            <button type="submit" class="btn btn-success">Update &next</button>
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