
@extends('layouts.app')  

@section('content_header')
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Increment</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Increment</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection  
  
@section('main_content')



  
   <div class="container-fluid">
   
        <div class="row">
            <!-- left column -->
      <div class="col-md-8 m-auto">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Increment</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('increment_add_action') }}" onsubmit="return validateForm()">
            @csrf
            <div class="card-body">

            
            

                  <div class="row" >
                    <!-- first two -->
                    <div class="col-md-6 auto">
                    <div class="form-group">
                           <label for="Employee ID">Employee ID</label>

                            <select name="employeeId" id="employeeId" class="form-control">
                            <option value="">Select Employee</option>

                            @foreach($employeeInfo as $com)
                                <option value="{{ $com->id }}">{{ $com->employeeId }} ({{ $com->name }})</option>
                                
                            @endforeach
                           
                                    </select>
                                <span id="employeeIdError" class="text-danger"></span>
                          </div>
                    </div>
                    <div class="col-md-6 auto"> 
                         <div class="form-group">
                        <label for="Adjust month">Adjust month</label>
                              <select name="adjustMonth" id="adjustMonth" class="form-control">
                              <option value="">Select Adjust Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="Noverber">Noverber</option>
                                <option value="December">December</option>
                              
                              </select>
                        <span id="adjustMonthError" class="text-danger"></span>
                      </div> 
                 
                    </div>

                    <div class="col-md-4 auto">
                    <div class="form-group">
                            <label for="Increment Date">Increment Date</label>
                              <input type="date" autocomplete="off" class="form-control" id="incrementDate" name="incrementDate" placeholder="Enter Increment Date">
                              <span id="incrementDateError" class="text-danger"></span>
                         </div>  
                    </div> 
                    <div class="col-md-4 auto">
                            <div class="form-group">
                              <label for="Effective Date">Effective Date</label>
                              <input type="date" autocomplete="off" class="form-control" id="effectiveDate" name="effectiveDate" placeholder="Enter Effective Date">
                              <span id="effectiveDateError" class="text-danger"></span>
                         </div>
                         </div> 
                    <div class="col-md-4 auto">
                    <div class="form-group">
                        <label for="Effective month">Effective month</label>
                              <select name="effectiveMonth" id="effectiveMonth" class="form-control">
                              <option value="">Select Effective Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="Noverber">Noverber</option>
                                <option value="December">December</option>
                              
                              </select>
                        <span id="effectiveMonthError" class="text-danger"></span>
                      </div> 
                         </div> 
                    
                    
                    
<!-- //3rd Input -->
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Gross Increment">Gross Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="grossIncrement" name="grossIncrement" placeholder="Enter Gross Increment">
                        <span id="grossIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Other Allowance">Other Allowance</label>
                        <input type="number" autocomplete="off" class="form-control" id="otherAllowance" name="otherAllowance" placeholder="Enter Other Allowance">
                        <span id="otherAllowanceError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Net Gross Increment">Net Gross Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="NetgrossIncrement" name="NetgrossIncrement" placeholder="Enter Net Gross Increment">
                        <span id="NetgrossIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Salary Increment">Salary Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="salaryIncrement" name="salaryIncrement" placeholder="Enter Salary Increment">
                        <span id="salaryIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Others Increment">Others Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="otherIncrement" name="otherIncrement" placeholder="Enter Others Increment">
                        <span id="otherIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                  
                  
                  

                      <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Distribution Type">Distribution Type</label>
                              <select name="distribution" id="distribution" name='distribution' class="form-control">
                              <option value="">Select Distribution Type</option>
                                <option value="Fixed Amount">Fixed Amount</option>
                                <option value="Changeable Amount">Changeable Amount</option>
                              
                              </select>
                        <span id="distributionError" class="text-danger"></span>
                      </div> 
                      </div> 
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Bank">Bank</label>
                        <input type="number" autocomplete="off" class="form-control" id="bank" name="bank" placeholder="Enter Bank">
                        <span id="bankError" class="text-danger"></span>
                      </div> 
                      </div> 
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Cash">Cash</label>
                        <input type="number" autocomplete="off" class="form-control" id="cash" name="cash" placeholder="Enter Cash">
                        <span id="cashError" class="text-danger"></span>
                      </div> 
                      </div> 
           
                  </div>
                  
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('increment_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
              
            </div>
          </form>
        </div>
        <!-- /.card -->

           

      </div>
      <!--/.col (left) -->
        </div>

   
    </div>
    <!-- /.row -->
   
    
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  <script>
  function validateForm() {
    var inputs = [

    { id: "employeeId", name: "Employee ID" },
    { id: "adjustMonth", name: "Adjust Date" },
    { id: "incrementDate", name: "Increment Date" },
    { id: "effectiveDate", name: "Effective Date" },
    { id: "effectiveMonth", name: "Effective Month" },
    { id: "grossIncrement", name: "Gross Increment" },
    { id: "otherAllowance", name: "Other Allowance" },
    { id: "NetgrossIncrement", name: "Net Gross Increment" },
    { id: "distribution", name: "Distribution" },
    { id: "bank", name: "Bank" },
    { id: "cash", name: "Cash" },
    { id: "salaryIncrement", name: "Salary Increment" },
    { id: "otherIncrement", name: "Other Increment" },

    ];

    var firstInvalidInput = null; // Variable to store the first invalid input

inputs.forEach(function (input) {
  var value = document.getElementById(input.id).value.trim();
  var errorElement = document.getElementById(input.id + "Error");

  errorElement.innerText = "";

  if (value === "") {
    errorElement.innerText = "* Please enter the " + input.name;
    if (!firstInvalidInput) {
      firstInvalidInput = document.getElementById(input.id);
    }
    document.getElementById(input.id).classList.add("is-invalid");
  } else {
    document.getElementById(input.id).classList.remove("is-invalid");
  }
});

// Set focus to the first invalid input, if any
if (firstInvalidInput) {
  firstInvalidInput.focus();
  return false; // Prevent form submission
}

return true; // Proceed with form submission
}
</script>
@endsection   