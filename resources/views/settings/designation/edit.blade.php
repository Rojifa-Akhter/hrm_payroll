
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Designation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Designation</li>
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
                <h3 class="card-title">Edit Designation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_designation') }}" onsubmit="return validateForm()">
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="name">Designation Name</label>
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $designation_info->id }}" >
                    <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Designaton Name" value="{{ $designation_info->desig_name }}" >
                    <span id="nameError" class="text-danger"></span>  
                  </div>  

                  <div class="form-group">
                    <label for="code">Description</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="description" placeholder="Enter Designation Info" value="{{ $designation_info->desig_description }}">
                     <span id="descriptionError" class="text-danger"></span>
                  </div>  

                <div class="form-group">
                    <label for="address">Designation Rank</label>
                    <input type="number" autocomplete="off" class="form-control" id="rank" name="rank" placeholder="Enter Designation Rank" value="{{ $designation_info->desig_rank }}">
                    <span id="rankError" class="text-danger"></span>
                  </div>  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation Short Name</label>
                    <input type="text" autocomplete="off" class="form-control" id="sname" name="sname" placeholder="Enter Designation Short Name" value="{{ $designation_info->desig_short_name }}">
                    <span id="snameError" class="text-danger"></span>

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
                  <a href="{{ route('designation_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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
    { id: "name", name: "Designation Name" },
    { id: "description", name: "Designation Description" },
    { id: "rank", name: "Designation Rank" },
    { id: "sname", name: "Designation Short Name" },
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