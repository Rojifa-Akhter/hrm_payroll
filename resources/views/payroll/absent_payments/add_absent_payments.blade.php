@extends('layouts.app')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Add Absent Payments</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Absent Payments</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('main_content')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12 m-auto">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add  Absent Payments </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('absent_payments_add_action') }}" onsubmit="return validateForm()">
          @csrf
          <div class="card-body">
            <div class="d-flex">

              <div class="form-group col-4">
                <label for="emId" class="form-label">Employee</label>
                <select class="form-select form-control" id="emId" name="emId" required onchange="updateName()">
                    <option>Select Employee</option>
                    @foreach ($employee_info as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}({{$employee->employeeId}})</option>
                    @endforeach
                </select>
                <p id="emIdError" class="text-danger"></p>
            </div>

              <div class="form-group col-4">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" >
                  <p id="nameError" class="text-danger"></p>
              </div>

              <div class="form-group col-4">
                  <label for="desig_name">Designation</label>
                  <input type="text" class="form-control" id="desig_name" name="desig_name" placeholder="Enter designation" >
                  <p id="desig_nameError" class="text-danger"></p>
              </div>

            </div>

            

            <div class="d-flex">
              
                    <div class="form-group col-4">
                        <label for="adjust_month">Adjust Month</label>
                        <input type="month" class="form-control" id="adjust_month" name="adjust_month" placeholder="Enter adjust month" >
                        <p id="adjust_monthError" class="text-danger"></p>
                    </div>
                    <div class="form-group col-4">
                        <label for="payment_days">Payment Days</label>
                        <input type="number" class="form-control" id="payment_days" name="payment_days" placeholder="Enter payment days" >
                        <p id="payment_daysError" class="text-danger"></p>
                    </div>

                      <div class="form-group col-4">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" >
                        
                      </div>

            </div>

           

            
            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('absent_payments_list') }}" class="btn btn-danger">Go Back</a>
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
function validateForm() {
  var fields = [
    { id: "emId", name: "Employee ID" },
    { id: "name", name: "Employee Name" },
    { id: "adjust_month", name: "adjust month" },
    { id: "payable_days", name: "Payable days" },
    { id: "amount", name: "amount" },
    // { id: "status", name: "Status" }
  ];

  var isValid = true;

  fields.forEach(function(field) {
    var value = document.getElementById(field.id).value.trim();
    var errorElement = document.getElementById(field.id + "Error");

    errorElement.innerText = "";

    if (value === "") {
      errorElement.innerText = "* Please enter the " + field.name;
      isValid = false;
      document.getElementById(field.id).classList.add("is-invalid");
    } else {
      document.getElementById(field.id).classList.remove("is-invalid");
    }
  });

  return isValid;
}
</script>

<script>
    function updateName() {
        var selectElement = document.getElementById('emId');
        var nameInput = document.getElementById('name');
        var designationInput = document.getElementById('desig_name');

        // Get the selected employeeId and the corresponding name from the data passed to the view
        var selectedEmployeeId = selectElement.value;
        var employees = @json($employee_info);

        // Find the employee with the selected ID and update the name input field
        var selectedEmployee = employees.find(function (employee) {
            return employee.id == selectedEmployeeId;
        });

        nameInput.value = selectedEmployee ? selectedEmployee.name : '';
        designationInput.value = selectedEmployee ? selectedEmployee.desig_name : '';
    }

   
</script>



@endsection
