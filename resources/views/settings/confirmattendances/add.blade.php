
    @extends('layouts.app')  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Attendance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    @endsection  
      
    @section('main_content')

     <!-- Script -->
     <script>
                $(document).ready(function(){
                  $('#add-btn').on('click',function(){
                    
                    // var newRow = `<div class="form-group row">
                    // <div class="form-group col"><label for="employee_id">employee ID</label><select name="employee_id" class="form-control"><option value="">Select employee</option><?php foreach($employees as $emp){ ?><option value="{{ $emp->employeeId }}">{{ $emp->name }}</option><?php } ?></select>  </div><div class="form-group col"><label for="date">Date</label><input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder=""></div>  <div class="form-group col"><label for="description">Time In</label><input type="datetime-local" autocomplete="off" class="form-control" id="timeIn" name="timeIn" placeholder=""></div><div class="form-group col"><label for="timeOut">Time Out</label><input type="datetime-local" autocomplete="off" class="form-control" id="timeOut" name="timeOut" placeholder=""></div><div class="form-group col"><label for="overtime">Overtime</label><input type="text" autocomplete="off" class="form-control" id="overtime" name="overtime" placeholder="Enter Hours"></div><div class="form-group col"><label for="remarks">Remarks</label><input type="text" autocomplete="off" class="form-control" id="remarks" name="remarks" placeholder=""></div></div>`;     
                    

                    var newRow = ` 
                    <div class="form-group row">
                    <div class="form-group col">
                        <label for="employee_id">Employee</label>
                      
                        <select name="employee_id[]" class="form-control">
                        <option value="">Select employee</option>
                          <?php foreach($employees as $emp){ ?>
                          <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                          <?php } ?>
                        </select>  
                      </div>
                      <div class="form-group col">
                        <label for="working_days">Working Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="working_days" name="working_days[]" placeholder="">
                      </div>  

                      <div class="form-group col">
                        <label for="present_days">Present Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="present_days" name="present_days[]" placeholder="">
                      </div>  

                      <div class="form-group col">
                        <label for="absent_days">Absent Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="absent_days" name="absent_days[]" placeholder="">
                      </div>
                    
                      <!-- <div class="form-group col">
                        <label for="overtime">Overtime</label>
                        <input type="text" autocomplete="off" class="form-control" id="overtime" name="overtime[]" placeholder="Enter Hours">
                      </div> -->


                      <div class="form-group col">
                        <label for="payable_days">Payable Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="payable_days" name="payable_days[]" placeholder="">
                      </div>
                  </div>
                    
                    `;
                    $('.card-body').append(newRow);
                      });
                });
              </script>



            <div class="row" style="padding-left: 1em">
                    <div class="col-sm-1">         
                      <button id="add-btn" class="btn btn-block btn-primary">Add</button>
                    </div>

                     
            </div>
    
      
       <div class="container-fluid">
       
            <div class="row">
                <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary " >
              <div class="card-header">
                <h3 class="card-title">Add Attendance</h3>
              </div>

              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('confirmattendance_add_action') }}" >
                @csrf
                <div class="card-body" >
                <div class="form-group col-sm-2">
                        <!-- <label for="month">Select Month</label> -->
                        <input type="month" autocomplete="off" class="form-control" id="month" name="month" placeholder="Select Month">
                      </div>
                  <div class="form-group row">
                    <div class="form-group col">
                        <label for="employee_id">Employee</label>
                      
                        <select name="employee_id[]" class="form-control">
                        <option value="">Select employee</option>
                          <?php foreach($employees as $emp){ ?>
                          <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                          <?php } ?>
                        </select>  
                      </div>
                      <div class="form-group col">
                        <label for="working_days">Working Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="working_days" name="working_days[]" placeholder="">
                      </div>  

                      <div class="form-group col">
                        <label for="present_days">Present Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="present_days" name="present_days[]" placeholder="">
                      </div>  

                      <div class="form-group col">
                        <label for="absent_days">Absent Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="absent_days" name="absent_days[]" placeholder="">
                      </div>
                    
                      


                      <div class="form-group col">
                        <label for="payable_days">Payable Days</label>
                        <input type="text" autocomplete="off" class="form-control" id="payable_days" name="payable_days[]" placeholder="">
                      </div>
                  </div>
                  



                

                  <!-- <div class="form-group">
                    <label for="company_id">company_id</label>
                    <input type="text" autocomplete="off" class="form-control" id="company_id" name="company_id" placeholder="">
                  </div>      -->

            <!--
                  <div class="form-group">
                    <label for="exampleInputFile">banks Logo</label>
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
                   <a href="{{ route('confirmattendances_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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