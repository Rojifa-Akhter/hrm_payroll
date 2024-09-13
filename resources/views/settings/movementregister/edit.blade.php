
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Full Day Movement Register</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Movement Register</li>
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
                <h3 class="card-title">Edit Full Day Movement Register</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_movementregister') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="department">Employee Name</label>
                   
                    <select name="employee_id" class="form-control">
                    <option value="">Select employee</option>
                      <?php foreach($departments as $dep){ ?>
                      <option <?php if($dep->id==$sections_info->employeeId) echo 'selected'; ?> value="{{ $dep->id }}">{{ $dep->name }}</option>
                      <?php } ?>
                     
                    </select>  
                  </div>

                <div class="form-group">
                   
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $sections_info->id }}" >
                    
                  </div>  

                  <!-- <div class="form-group">
                    <label for="description">date</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="date" placeholder="" value="{{ $sections_info->date}}">
                  </div>   -->
                  <div class="form-group">
                    <label for="description">Location</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="location" placeholder="" value="{{ $sections_info->address}}">
                  </div>  
                  <div class="form-group">
                    <label for="description">From</label>
                    <input type="date" autocomplete="off" class="form-control" id="description" name="fromDate" placeholder="" value="{{ $sections_info->fromDate}}">
                  </div>  
                  <div class="form-group">
                    <label for="description">To</label>
                    <input type="date" autocomplete="off" class="form-control" id="description" name="toDate" placeholder="" value="{{ $sections_info->toDate}}">
                  </div>  
                  <div class="form-group">
                    <label for="description">Job/Task details</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="reason" placeholder="" value="{{ $sections_info->reason}}">
                  </div> 

                  <div class="form-group">
                  <label for="task_status">Task Status</label>
                    <select name="task_status" id="task_status" >
                      <optgroup label="task_status">
                        <option <?php if($sections_info->task_status=="complete") echo "selected"; ?> value="complete">Complete</option>
                        <option <?php if($sections_info->task_status=="incomplete") echo "selected"; ?> value="incomplete">Incomplete</option>
                        <option <?php if($sections_info->task_status=="pending") echo "selected"; ?> value="pending">Pending</option>
                      </select>
                      </div>




                  <!-- <div class="form-group">
                    <label for="company_id">Company ID</label>
                    <input type="text" autocomplete="off" class="form-control" id="company_id" name="company_id" placeholder="" value="{{ $sections_info->company_id }}">
                  </div>      -->

            <!--
                  <div class="form-group">
                    <label for="exampleInputFile">sections Logo</label>
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
                  <a href="{{ route('movementregister_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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