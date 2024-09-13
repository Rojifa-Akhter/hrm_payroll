
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">sections</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">attendance</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    @endsection  
      
    @section('main_content')


      
       <div class="container-fluid">
       
            <div class="row">
                <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit attendance</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_attendance') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="department">Employee</label>
                   
                    <select name="employee_id" class="form-control">
                    <option value="">Select employee</option>
                      <?php foreach($departments as $dep){ ?>
                      <option <?php if($dep->id==$sections_info->employeeId) echo 'selected'; ?> value="{{ $dep->id }}">{{ $dep->name }}</option>
                      <?php } ?>
                     
                    </select>  
                  </div>

                  <div class="form-group">
                    <label for="description">date</label>
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $sections_info->id }}" >
                    <input type="date" autocomplete="off" class="form-control" id="description" name="date" placeholder="" value="{{ $sections_info->date}}">
                  </div>  
                  <div class="form-group">
                    <label for="description">timeIn</label>
                    <?php
                        // Your datetime string
                        $datetime_str = $sections_info->timeIn;
                        $datetime_str2 = $sections_info->timeOut;

                        // Step 1: Parse datetime string to DateTime object
                        $datetime = new DateTime($datetime_str);
                        $datetime2 = new DateTime($datetime_str2);

                        // Step 2: Format DateTime object to get time string
                        $time_str = $datetime->format('H:i');
                        $time_str2 = $datetime2->format('H:i');
                        ?>
                    <input type="time" autocomplete="off" class="form-control" id="description" name="timeIn" placeholder="" value="{{ $time_str }}">
                  </div>  
                  <div class="form-group">
                    <label for="description">timeOut</label>
                    <input type="time" autocomplete="off" class="form-control" id="description" name="timeOut" placeholder="" value="{{ $time_str2 }}">
                  </div>  
                  
                  <div class="form-group">
                    <label for="description">remarks</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="remarks" placeholder="" value="{{ $sections_info->remarks}}">
                  </div> 

                  <div class="form-group">
                    <label for="department">Status</label>
                   
                    <select name="status" class="form-control">
                      <option value="">Select Status</option>
                      <option <?php if($sections_info->status=="Present") echo 'selected'; ?> value="Present">Present</option>
                      <option <?php if($sections_info->status=="Late") echo 'selected'; ?> value="Late">Late</option>
                      <option <?php if($sections_info->status=="Early") echo 'selected'; ?> value="Early">Early</option>
                      
                    </select>  
                  </div>
                 

           
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('attendances_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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