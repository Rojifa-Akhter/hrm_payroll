
@extends('layouts.app')  

@section('content_header')
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Subsection</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Subsection</li>
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
            <h3 class="card-title">Add Subsection</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('subsection_add_action') }}" onsubmit="return validateForm()">
            @csrf
            <div class="card-body">

            
         

                  <div class="form-group">
                    <label for="section">Sub Section</label>
                    <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Enter Sub section">
                    <span id="sectionError" class="text-danger"></span>
                  </div>  

                  <div class="form-group">
                    <label for="section name">Section Name</label>

                    <select name="section" id="section" class="form-control">
                            <option value="">Select Section Name</option>

                            @foreach($sectioninfo as $com)
                                <option value="{{ $com->id }}">{{ $com->section_name }}</option>
                            @endforeach
                    </select>
                    <span id="nameError" class="text-danger"></span>
                  </div>

                 

                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="description" placeholder="Enter description"> 
                    <span id="descriptionError" class="text-danger"></span>
                  </div>  

                 
             
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('subsection_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
              
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

    { id: "name", name: "Sub Section Name" },
    { id: "section", name: "Section" },
    { id: "description", name: "Description" },

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