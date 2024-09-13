
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daily Attendance Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Daily Attendance Report</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    @endsection  
      
    @section('main_content')

      <div class="col-md-12">
        <form method="get" action="{{ route('daily_attendance_report') }}">
          <div class="form-group row">
                      <!-- <div class="form-group col-sm-2">
                        <label for="month">Select Month</label> 
                        <input type="month" autocomplete="off" class="form-control" id="month" name="month" placeholder="Select Month">
                      </div> -->
                      <div class="form-group col-sm-2">
                        <!-- <label for="month">Select Month</label> -->
                        <input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder="Select Month" value={{ $date }}>
                    </div>

                    <div class="form-group col-sm-2">
                        <!-- <label for="employee_id">Employee</label> -->
                      
                        <select name="employee_id" id="employee_id" class="form-control">
                        <option value="">Select employee</option>
                          <?php foreach($employees as $emp){ ?>
                          <option <?php if($employee==$emp->id) echo 'selected'; ?> value="{{ $emp->id }}">{{ $emp->name }}</option>
                          <?php } ?>
                        </select>  
                      </div>

                      <div class="form-group col-sm-2">
                        <!-- <label for="employee_id">Employee</label> -->
                      
                        <select name="designation" id="designation" class="form-control">
                        <option value="">Select Designation</option>
                          <?php foreach($employees as $emp){ ?>
                          <option value="{{ $emp->designation }}">{{ $emp->designation }}</option>
                          <?php } ?>
                        </select>  
                      </div>
                      <div class="card-footer">
                  <button type="submit"  class="btn btn-primary">Search</button>
                   <a href="{{ route('daily_attendance_report') }}">  <button type="button" class="btn btn-primary">Reset</button> </a>
                  
                </div>
                


        </form>
        <!-- <a style="padding-left: 1em" href=""><button type="button" class="btn btn-sm btn-primary">Search</button></a>
        <a style="padding-left: 1em" href=""><button type="button" class="btn btn-sm btn-primary">Reset</button></a>
        </div>  -->
      <br />
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daily Attendance </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Date</th>
                    <th>Entry Time</th>
                    <th>Exit Time</th>
                    <th>Status</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($joined_data)){
                    foreach($joined_data as $data){  ?>
                        <tr>
                          <td>{{ $data->employeeId }}</td>
                          <td>{{ $data->name }}</td>
                          <td>{{ $data->desig_name }}</td>
                          <td>{{ date('d-m-Y',strtotime($data->date)) }}</td>
                          <td>{{ date('h:i A',strtotime($data->timeIn)) }}</td>
                          <td>{{ date('h:i A',strtotime($data->timeOut)) }}</td>
                          <td>{{ $data->status }}</td>
                          
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
@endsection   