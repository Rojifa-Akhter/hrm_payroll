<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Input Fields</title>
</head>
<body>
@extends('layouts.app')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Work program</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Work programs</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('main_content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add work programs</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('work_program_add_section') }}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Date</label>
                                <input type="date" class="form-control" id="name" name="date" placeholder="Date">
                                <p id="x" class="text-danger"></p>
                            </div>

                            <div class="form-group">
                                <label for="code">Dead Line</label>
                                <input type="date" class="form-control" id="code" name="deadline" placeholder="Dead line">
                                <p id="y" class="text-danger"></p>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="concern_type" id="concernType">
                                    <option value="">Concern Types</option>
                                    <option value="Others">Others</option>
                                    <option value="Company">Company</option>
                                    <option value="Employee">Employee</option>
                                </select>
                                <p id="z" class="text-danger"></p>
                            </div>

                            <div class="form-group" id="companyInput" style="display: none;">
                                <select name="organization" class="form-control">
                                    <option value="">Select Company</option>
                                    @foreach($companies as $companie)
                                        <option value="{{ $companie->id }}">{{ $companie->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="employeeInput" style="display: none;">
                                <select name="employee_id" class="form-control">
                                    <option value="">Select Employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="othersInput" style="display: none;">
                                <label>Others</label>
                                <input type="text" name="others" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="work-details">Work Details</label>
                                <textarea class="form-control" id="work-details" name="job"></textarea>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('work_program_list') }}">
                                    <button type="button" class="btn btn-primary">Go Back</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
    </div>
    <!-- /.container-fluid -->

    <script>
        const concernTypeSelect = document.getElementById("concernType");
        const companyInput = document.getElementById("companyInput");
        const employeeInput = document.getElementById("employeeInput");
        const othersInput = document.getElementById("othersInput");
        concernTypeSelect.addEventListener("change", function () {
            const selectedValue = concernTypeSelect.value;

            switch (selectedValue) {
                case "Others":
                    companyInput.style.display = "none";
                    employeeInput.style.display = "none";
                    othersInput.style.display = "block";

                    break;
                case "Company":
                    companyInput.style.display = "block";
                    employeeInput.style.display = "none";
                    othersInput.style.display = "none";
                    break;
                case "Employee":
                    companyInput.style.display = "none";
                    employeeInput.style.display = "block";
                    othersInput.style.display = "none";
                    break;
                default:
                    companyInput.style.display = "none";
                    employeeInput.style.display = "none";
                    othersInput.style.display = "none";
                    break;
            }
        });
    </script>
@endsection

</body>
</html>
