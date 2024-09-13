
@extends('layouts.app')  

@section('content_header')
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Half Leave</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Half Leave</li>
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
            <h3 class="card-title">Add Half Leave</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('halfLeave_add_action') }}" onsubmit="return validateForm()">
            @csrf
            <div class="card-body">

            
          

                  <div class="form-group">
                    <label for="Employee ID">Employee ID</label>

                    <select name="employeeId" id="employeeId" class="form-control">
                            <option value="">Select Employee ID</option>

                            @foreach($employeeInfo as $com)
                                <option value="{{ $com->id }}">{{ $com->name }} ({{ $com->employeeId }})</option>
                            @endforeach
                    </select>
                    <span id="employeeIdError" class="text-danger"></span>
                  </div>

                  <div class="form-group">
                    <label for="Date">Leave Date</label>
                    <input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder="Enter Leave Date">
                    <span id="dateError" class="text-danger"></span>
                  </div>  

                <div class="form-group">
                    <label for="Start Time">Start Time</label>
                    <input type="time" autocomplete="off" class="form-control" id="startTime" name="startTime" placeholder="Enter Start Time"> 
                    <span id="startTimeError" class="text-danger"></span>
                  </div>  
                  <div class="form-group">
                    <label for="End Time">End Time</label>
                    <input type="time" autocomplete="off" class="form-control" id="endTime" name="endTime" placeholder="Enter End Time">
                    <span id="endTimeError" class="text-danger"></span>
                  </div>  

                  <div class="form-group">
                    <label for="Reason">Leave Reason</label>
                    <input type="text" autocomplete="off" class="form-control" id="reason" name="reason" placeholder="Enter Reason">
                    <span id="reasonError" class="text-danger"></span>
                  </div> 

                 

               

        
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('halfLeave_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
              
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
    { id: "date", name: "Leave Date" },
    { id: "startTime", name: "Start Time" },
    { id: "endTime", name: "End Time" },
    { id: "reason", name: "Reason" },
    

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