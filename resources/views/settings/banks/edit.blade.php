
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bank</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Bank</li>
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
                <h3 class="card-title">Edit Bank</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_bank') }}" onsubmit="return validateForm()" >
                @csrf
                <div class="card-body">
                
                <div class="form-group">
                    <label for="name">Bank Name</label>
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $bank_info->id }}" >
                    <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Bank Name" value="{{ $bank_info->name }}" >
                    <span id="nameError" class="text-danger"></span>
                  </div>  

                  <div class="form-group">
                    <label for="code">Company Account</label>
                    <input type="text" autocomplete="off" class="form-control" id="company" name="company" placeholder="Enter Company Account" value="{{ $bank_info->company_account }}">
                    <span id="companyError" class="text-danger"></span>
                  </div>  

                <div class="form-group">
                    <label for="address">Branch Name</label>
                    <input type="text" autocomplete="off" class="form-control" id="brname" name="brname" placeholder="Enter Branch Name" value="{{ $bank_info->branch_name }}">
                    <span id="brnameError" class="text-danger"></span>
                  </div>  

                  <div class="form-group">
                    <label for="code">Bank Type</label>
                    <input type="text" autocomplete="off" class="form-control" id="btype" name="btype" placeholder="Enter Bank Type" value="{{ $bank_info->bank_type }}">
                    <span id="btypeError" class="text-danger"></span>
                  </div>  

                <div class="form-group">
                    <label for="address">Routing Number</label>
                    <input type="text" autocomplete="off" class="form-control" id="rnumber" name="rnumber" placeholder="Enter Routing Number" value="{{ $bank_info->routing_number }}">
                    <span id="rnumberError" class="text-danger"></span>
                  </div>  

            <!--
                  <div class="form-group">
                    <label for="exampleInputFile">Company Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
            -->      
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('bank_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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
    { id: "name", name: "Bank name" },
    { id: "company", name: "Company Account" },
    { id: "brname", name: "Branch name" },
    { id: "btype", name: "Bank type" },
    { id: "rnumber", name: "Routing number" },
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