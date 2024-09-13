
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
            <h3 class="card-title">Add Bank</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('bank_add_action') }}" id="form" onsubmit="return validateForm()">
            @csrf
            <div class="card-body">

            <div class="form-group">
                <label for="Name">Bank Name</label>
                <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Bank Name">
                <span id="nameError" class="text-danger"></span>
              </div>  

              <div class="form-group">
                <label for="Company Account">Company Account</label>
                <input type="text" autocomplete="off" class="form-control" id="company" name="company" placeholder="Enter Company Account">
                <span id="companyError" class="text-danger"></span>

              </div>  

            <div class="form-group">
                <label for="Branch Name">Branch Name</label>
                <input type="text" autocomplete="off" class="form-control" id="brname" name="brname" placeholder="Enter Branch Name">
                <span id="brnameError" class="text-danger"></span>

              </div>  

              <div class="form-group">
                <label for="address">Bank Type</label>
                <input type="text" autocomplete="off" class="form-control" id="btype" name="btype" placeholder="Enter Bank Type">
                <span id="btypeError" class="text-danger"></span>

              </div>  

              
              <div class="form-group">
                <label for="exampleInputEmail1">Routing Number</label>
                <input type="text" autocomplete="off" class="form-control" id="rnumber" name="rnumber" placeholder="Enter Routing Number">
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
              <button type="submit" class="btn btn-primary">Submit</button>
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
// function validateBankName(){
//   var inputs = [{ id: "name", name: "Bank name" }];
//   var value = document.getElementById(inputs.id).value.trim();
//   var errorElement = document.getElementById(inputs.id + "Error");
//   errorElement.innerText = "";
// 	// if(value ==""){
//   //   errorElement.innerText = "* Please enter the " + inputs.name;		
// 	// }else{
//   //   errorElement.innerText = "";		
// 	// }
//   if (value === "") {
//     errorElement.innerText = "* Please enter the " + inputs.name;
//     isValid = false;
//     document.getElementById(inputs.id).classList.add("is-invalid");
//   } else {
//     document.getElementById(inputs.id).classList.remove("is-invalid");
//   }
// }


// <script>
//   function validateForm() {
//     var inputs = [
//       { id: "name", name: "Bank name" },
//       { id: "company", name: "Company Account" },
//       { id: "brname", name: "Branch name" },
//       { id: "btype", name: "Bank type" },
//       { id: "rnumber", name: "Routing number" },
//     ];

//     var isValid = true;

//     inputs.forEach(function (input) {
//       var value = document.getElementById(input.id).value.trim();
//       var errorElement = document.getElementById(input.id + "Error");

//       errorElement.innerText = "";

//       if (value === "") {
//         errorElement.innerText = "* Please enter the " + input.name;
//         isValid = false;
//         document.getElementById(input.id).classList.add("is-invalid");
//         // Set focus to the first invalid input element
//         if (!isValid) {
//           document.getElementById(input.id).focus();
//         }
//       } else {
//         document.getElementById(input.id).classList.remove("is-invalid");
//       }
//     });

//     return isValid;
//   }
// </script>

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
