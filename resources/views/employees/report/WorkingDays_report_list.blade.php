@extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 ">Employee Service Length Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    @endsection  
      
    @section('main_content')

      
      <h6 class="text-center text-success ">{{session('message')}}</h6>
      <br />
       <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Employee Service Length</h3>
              </div>
              <div class="card-body">
              <form method="post" action="{{ route('service_length_report') }}" onsubmit="return validateForm()">
              @csrf
            <div class="d-flex">

              <div class="form-group col-3">
                <label for="employeeId" class="form-label">Employee</label>
                <select class="form-select form-control" id="emId" name="emId" >
                    <option value="">Select Employee</option>
                    @foreach ($employee_info as $emp)
                        <option value="{{ $emp->id }}"  {{ $emp->id == $employeeId ? 'selected' : '' }}>{{ $emp->name }}({{$emp->employeeId}})</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group col-3">
                <label for="designation" class="form-label">Designation</label>
                <select class="form-select form-control" id="designationId" name="designationId" >
                    <option value="">Select Designation</option>
                    @foreach ($designation_info as $designation)
                    <option value="{{ $designation->id }}" {{ $designation->id == $designationId ? 'selected' : '' }}>{{ $designation->desig_name }}</option>
                     @endforeach
                </select>
              </div>

              <div class="form-group col-2">
                  <label for="department" class="form-label">Department</label>
                  <select class="form-select form-control" id="departmentId" name="departmentId">
                      <option value="">Select Department</option>
                      @foreach ($department_info as $department)
                          <option value="{{ $department->id }}" {{ $department->id == $departmentId ? 'selected' : '' }}>{{ $department->dept_short_name }}</option>
                          
                      @endforeach
                  </select>
              </div>

              <div class="form-group col-2">
                      <label for="startDateLeave">Start Date</label>
                      <input type="date" class="form-control" id="startDateLeave" name="startDate" placeholder="Enter startDateLeave" value='{{ $startdate }}'>
                      <!-- <p id="grossError" class="text-danger"></p> -->
              </div>

              <div class="form-group col-2">
                  <label for="endDateLeave">end Date</label>
                  <input type="date" class="form-control" id="endDateLeave" name="endDate" placeholder="Enter endDateLeave" value='{{ $enddate }}'>
                  <!-- <p id="grossError" class="text-danger"></p> -->
              </div>
            </div>

            <div class='d-flex'>

            <div class="form-group col-2">
                <label for="count" class="form-label">Select Option</label>
                <select class="form-select form-control" id="range" name="range">
                    <option value="">Select</option>
<!--                     
                    {{ $department->id == 'bellow' ? 'selected' : '' }} -->
                        <option value="bellow" {{ $Range == 'bellow' ? 'selected' : '' }}> Bellow </option>
                        <option value="above"{{ $Range == 'above' ? 'selected' : '' }}> Above </option>
                        
                </select>
              </div>

              <div class="form-group col-2">
                <label for="count" class="form-label">Year</label>
                <select class="form-select form-control" id="totalYear" name="totalYear">
                    <option value="">Select Year</option>
                    <!--  -->
                    @foreach ($years as $year)
                        <option value="{{ $year }}" {{ $TotalYear == $year ? 'selected' : '' }}>{{ $year }}</option>                        
                    @endforeach
                </select>
              </div>
            </div>

            <div class="d-flex justify-content-center text-center">    
                  <div class="form-group col-4">
                    <button type="submit" class='btn btn-success'  id="searchButton" >Search</button> 
                    <button type="button" class='btn btn-warning text-white' onclick="printContent()">Print</button>  
                  </div>    

            </div>
</form>

            </div>
              <!-- /.card-header -->
              <div class="card-body print-content">
              <h6 class="fw-bold my-3">Employee Service Length Report</h6>
                <table id="example2" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
               
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Joining Date</th>
                    <th>Resign Date</th>
                    <th>Total Working Period</th>
                    
                     
                  </tr>
                  </thead>
                  <tbody>
                    <?php 


                    if(!empty($table_employees)){
                    foreach($table_employees as $com){  

                      
                        $startDate = new DateTime($com->joinDate);
                        $endDate = new DateTime($com->resign_date);
                        
                        $interval = $startDate->diff($endDate);
                        
                        $daysDiff = $interval->days;
                        
                        $daysinMonth = convertDays($daysDiff);

                        
                        
                      ?>
                        <tr>
                          <td>{{ $com->employeeId }}</td>
                          <td>{{ $com->name }}</td>
                          <td>{{ $com->dept_short_name}}</td>
                          <td>{{ $com->desig_name}}</td>
                          <td>{{ $com->joinDate }}</td>
                          <td>{{ $com->resign_date }}</td>
                          <td>{{ $daysinMonth }}</td>
                        </tr>
                    <?php 

                 
                      }
                    } ?>    
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      

<script>
  function printContent() {
    var printContent = document.querySelector('.print-content').innerHTML;
    var originalContent = document.body.innerHTML;

    // Replace the entire body content with the print content
    document.body.innerHTML = printContent;

    // Print the modified body content
    window.print();

    // Restore the original body content
    document.body.innerHTML = originalContent;
  }

<?php

function convertDays($totalDays) {
  $daysInYear = 365;
  $daysInMonth = 30;

  $years = floor($totalDays / $daysInYear);
  $totalDays %= $daysInYear;

  $months = floor($totalDays / $daysInMonth);
  $remainingDays = $totalDays % $daysInMonth;

  // Construct the result string
  $result = '';
  if ($years > 0) {
      $result .= "$years year";
      if ($years > 1) {
          $result .= 's';
      }
  }
  if ($months > 0) {
      $result .= " $months month";
      if ($months > 1) {
          $result .= 's';
      }
  }
  if ($remainingDays > 0) {
      $result .= " $remainingDays day";
      if ($remainingDays > 1) {
          $result .= 's';
      }
  }
  if ($years == 0 && $months == 0 && $remainingDays == 0) {
      $result .= "0 days";
  }

  return $result;
}

?>
  // Call the printContent function when a button or link is clicked
  var printButton = document.querySelector('#printButton');
  printButton.addEventListener('click', printContent);
</script>



@endsection