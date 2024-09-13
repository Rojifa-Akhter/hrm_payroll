@extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 ">Master Salary Report List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-item active">Master Salary Report List</li>
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
                <h3 class="card-title">Master Salary Report List</h3>
              </div>
              <div class="card-body">
              <form method="post" action="{{ route('masterSalaryReport_list') }}" onsubmit="return validateForm()">
              @csrf
            <div class="d-flex">

              <div class="form-group col-3">
                <label for="employeeId" class="form-label">Employee</label>
                <select class="form-select form-control" id="emId" name="emId" >
                    <option value="">Select Employee</option>
                    @foreach ($all_employee_info as $emp)
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
                        <label for="startDateLeave">Month</label>
                        <input type="month" class="form-control" id="startDateLeave" name="month" placeholder="Enter Month" value='{{ $month }}'>
                        <!-- <p id="grossError" class="text-danger"></p> -->
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
              <h6 class="fw-bold my-3">Master Salary Report List</h6>
              <style>
                  /* Add custom styles to the table container */
                  .table-container {
                      overflow-x: auto;
                  }
                  
                  /* Optional: Adjust the height if needed */
                  #example2 {
                      max-height: 400px; /* Adjust the value as needed */
                  }
              </style>
              <div class="table-container">
                    <table id="example2" class="table table-bordered table-hover table-striped">
              
                    
                    <!-- <table id="example2" class="table table-bordered table-hover" style='overflow-x: scroll !important;'> -->
                      <thead style='' class=' bg-light'>
                     
                      <tr class='text-center'>
                            <th rowspan="2">SL</th>
                            <th rowspan="2">Name of the Employee</th>
                            <th rowspan="2">Department</th>
                            <th rowspan="2">Designation</th>
                            <th rowspan="2">j. Date</th>
                            <th rowspan="2">T.Days</th>
                            <th rowspan="2">P.Days</th>
                            <th rowspan="2">G.Salary</th>
                            <th rowspan="2">Cash</th>
                            <th rowspan="2">Bank</th>
                            <th rowspan="2">Absent Amount</th>
                            <th rowspan="2">Total Payable</th>
                            <th colspan="10">Deduction</th>
                            <th rowspan="2">Arrear</th>
                            <th rowspan="2">Net Payable</th>
                            
                        </tr>
                        <tr >
                            <th>Stamp</th>
                            <th>TDS</th>
                            <th>Gen. Loan</th>
                            <th>Sal. Adv. </th>
                            <th>Car Loan</th>
                            <th>meal</th>
                            <th>Mobile</th>
                            <th>Security</th>
                            <th>Other Deduction</th>
                            <th>Total Deduction</th>
                        </tr>
                        <thead>            
                        <tbody>
                                      @if (!empty($employee_info))
                                          @foreach ($employee_info as $com)
                                              <tr>
                                                  <td>{{ $com->id }}</td>
                                                  <td>{{ $com->name }}</td>
                                                  <td>
                                                          @foreach ($com->department_info as $department)
                                                              {{ $department->dept_short_name }}
                                                          @endforeach
                                                  </td>
                                                  <td>
                                                          @foreach ($com->designation_info as $designation)
                                                              {{ $designation->desig_name }}
                                                          @endforeach
                                                  </td>
                                                  
                                                  <td>{{ $com->joinDate }}</td>
                                               
                                                  <td>
                                                  @php
                                                      $workingDays = 0;
                                                      foreach ($com->attendance_info as $attendance) {
                                                          echo $attendance->working_days;
                                                          $workingDays += $attendance->working_days;
                                                      }
                                                  @endphp
                                                  </td>
                                                  <td>
                                                          @foreach ($com->attendance_info as $attendance)
                                                              {{ $attendance->present_days }}
                                                          @endforeach
                                                  </td>
                                                  <td>
                                                  @php
                                                      $grossSalary = 0;
                                                      foreach ($com->salary_info as $salary) {
                                                          echo $salary->gross;
                                                          $grossSalary = $salary->gross;
                                                      }
                                                  @endphp
                                                  </td>
                                                  
                                                  <td>{{ $com->cash_portion }}</td>
                                                  <td>{{ $com->bank_portion }}</td>
                                                  <td>
                                                  <?php
                                                        $absentAmount = 0;

                                                        foreach ($com->absentpayments_info as $attendance) {
                                                            $deduction = ($grossSalary / $workingDays) * $attendance->absent_days;
                                                            $absentAmount += $deduction;
                                                        }
                                                  ?>
                                                    
                                                    {{$absentAmount}}
                                                  </td>
                                                  <td>
                                                  @php
                                                          $totalPayable = $grossSalary - $absentAmount;
                                                  @endphp
                                                          {{$totalPayable}}
                                                  </td>
                                                  <!-- salary_info -->
                                                  <td>
                                                    <?php
                                                          $stamp = 0;
                                                          foreach ($com->salary_info as $salary)
                                                              $stamp += $salary->Stamp;
                                                    ?>
                                                          {{ $stamp }}
                                                  </td>
                                                  <td>
                                                  <?php
                                                          $tds = 0;
                                                          foreach ($com->salary_info as $salary)
                                                              $tds += $salary->TDS;
                                                    ?>
                                                          {{ $tds }}
                                                        
                                                  </td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>

                                                  <td>
                                                    <?php
                                                    $securityAmount = 0;
                                                          foreach ($com->salary_info as $salary)
                                                          $securityAmount += $salary->security_amount;
                                                    ?>

                                                          {{ $securityAmount }}
                                                  </td>
                                                  <td>
                                                  <?php
                                                          $otherDeduction = 0;
                                                          foreach ($com->salary_info as $salary)
                                                              $otherDeduction += $salary->meal_deduction + $salary->house_deduction + $salary->transport_deduction;    
                                                        
                                                  ?>
                                                          {{ $otherDeduction }}
                                                  </td>
                                                  <td>
                                                  <?php
                                                        $totalDeduction = 0;
                                                        $totalDeduction += $otherDeduction + $securityAmount +$stamp +$tds;

                                                    ?>
                                                    {{ $totalDeduction }}
                                                  </td>
                                                  <td>
                                                  <?php
                                                      $arrear  = $totalPayable - $totalDeduction;
                                                      
                                                      foreach ($com->salaryarrears_info as $salaryarrears)
                                                      $arrear += $salaryarrears->amount;

                                                    ?>
                                                    {{ $arrear }}
                                                  </td>
                                                  <td>
                                                    <?php
                                                      $netPayable  = $totalPayable - $totalDeduction + $arrear;
                                      

                                                    ?>
                                                    {{ $netPayable }}
                                                  </td>
                                                
                                              </tr>
                                          @endforeach
                                      @endif
                               </tfoot>
                            </tbody>
                      </table> 
                                                      </div>
                
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

  // Call the printContent function when a button or link is clicked
  var printButton = document.querySelector('#printButton');
  printButton.addEventListener('click', printContent);
</script>



@endsection