
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
                <h3 class="card-title">View Increment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" >
                @csrf
                <div class="card-body">

                
                   

                <div class="row" >
                    <!-- first two -->
                    <div class="col-md-6 auto">
                        <div class="form-group">
                           <label for="Employee ID">Employee</label>
                           <input type="hidden" class="form-control" id="id" name="id" value="{{ $increments_info->id }}">
                           <select name="employeeId" id="employeeId" class="form-control" disabled="disabled">
                               
                                @foreach($employee_Info as $com)
                                <option <?php if($com->id==$increments_info->emId) echo 'selected'; ?> value="{{ $com->id }}">{{ $com->name }} ({{ $com->employeeId }})</option>
                                @endforeach
                           </select>
                           <span id="employeeIdError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-6 auto"> 
                        <div class="form-group">
                        <label for="Adjust month">Adjust month</label>
                        <input type="text" autocomplete="off" class="form-control" id="adjustMonth" name="adjustMonth" placeholder="Enter Effective Month" value="{{  $increments_info->adjust_month }}" readonly>

                        <span id="adjustMonthError" class="text-danger"></span>
                      </div> 
                 
                    </div>

                    <div class="col-md-4 auto">
                    <div class="form-group">
                            <label for="Increment Date">Increment Date</label>
                              <input type="date" autocomplete="off" class="form-control" id="incrementDate" name="incrementDate" placeholder="Enter Increment Date" value="{{ $increments_info->increment_date }}" readonly>
                              <span id="incrementDateError" class="text-danger"></span>
                         </div>  
                    </div> 
                    <div class="col-md-4 auto">
                            <div class="form-group">
                              <label for="Effective Date">Effective Date</label>
                              <input type="date" autocomplete="off" class="form-control" id="effectiveDate" name="effectiveDate" placeholder="Enter Effective Date" value="{{ $increments_info->effective_date }}" readonly>
                              <span id="effectiveDateError" class="text-danger"></span>
                         </div>
                      </div> 
                    <div class="col-md-4 auto">
                    <div class="form-group">
                        <label for="Effective month">Effective month</label>
                        <input type="text" autocomplete="off" class="form-control" id="effectiveMonth" name="effectiveMonth" placeholder="Enter Effective Month" value="{{  $increments_info->effective_month }}" readonly>

                        <span id="effectiveMonthError" class="text-danger"></span>
                      </div> 
                         </div> 
                    
                    
                    
<!-- //3rd Input -->
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Gross Increment">Gross Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="grossIncrement" name="grossIncrement" placeholder="Enter Gross Increment" value="{{ $increments_info->gross }}" readonly>
                        <span id="grossIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Other Allowance">Other Allowance</label>
                        <input type="number" autocomplete="off" class="form-control" id="otherAllowance" name="otherAllowance" placeholder="Enter Other Allowance" value="{{ $increments_info->Others }}" readonly>
                        <span id="otherAllowanceError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Net Gross Increment">Net Gross Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="NetgrossIncrement" name="NetgrossIncrement" placeholder="Enter Net Gross Increment" value="{{ $increments_info->net_gross }}" readonly>
                        <span id="NetgrossIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Salary Increment">Salary Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="salaryIncrement" name="salaryIncrement" placeholder="Enter Salary Increment" value="{{ $increments_info->salary_increment_amount }}" readonly>
                        <span id="salaryIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Others Increment">Others Increment</label>
                        <input type="number" autocomplete="off" class="form-control" id="otherIncrement" name="otherIncrement" placeholder="Enter Others Increment" value="{{ $increments_info->others_increment_amount }}" readonly> 
                        <span id="otherIncrementError" class="text-danger"></span>
                      </div> 
                      </div>
                  
                   
                  

                      <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Distribution Type">Distribution Type</label>
      
                        <input type="text" autocomplete="off" class="form-control" id="distribution" name="distribution" placeholder="Enter distribution type" value="{{  $increments_info->type }}" readonly>

                        <span id="distributionError" class="text-danger"></span>
                      </div> 
                      </div> 
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Bank">Bank</label>
                        <input type="number" autocomplete="off" class="form-control" id="bank" name="bank" placeholder="Enter Bank" value="{{ $increments_info->bank_amount }}" readonly>
                        <span id="bankError" class="text-danger"></span>
                      </div> 
                      </div> 
                    <div class="col-md-4 auto">
                        <div class="form-group">
                        <label for="Cash">Cash</label>
                        <input type="number" autocomplete="off" class="form-control" id="cash" name="cash" placeholder="Enter Cash" value="{{ $increments_info->cash_amount }}" readonly>
                        <span id="cashError" class="text-danger"></span>
                      </div> 
                      </div> 
           
                  </div>
               
                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
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
@endsection   