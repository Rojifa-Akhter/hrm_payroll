
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Short Movement Register</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Short_Move</li>
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
                <h3 class="card-title">Edit Short Movement Register</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_shortmovementregister') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="department">Employee</label>                   
                    <select  name="employee_id" class="form-control">
                    <option value="">Select employee</option>
                      <?php foreach($departments as $dep){ ?>
                      <option <?php if($dep->id==$sections_info->emId) echo 'selected'; ?> value="{{ $dep->id }}">{{ $dep->name }}</option>
                      <?php } ?>
                     
                    </select>  
                  </div>

                <div class="form-group">
                   
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $sections_info->id }}" >
                   
                  </div>  

                  <div class="form-group">
                    <label for="description">date</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="date" placeholder="" value="{{ $sections_info->date}}">
                  </div>  
                  
                  <div class="form-group">
                    <label for="description">startTime</label>
                    <?php
                        // Your datetime string
                        $datetime_str = $sections_info->startTime;
                        $datetime_str2 = $sections_info->endTime;

                        // Step 1: Parse datetime string to DateTime object
                        $datetime = new DateTime($datetime_str);
                        $datetime2 = new DateTime($datetime_str2);

                        // Step 2: Format DateTime object to get time string
                        $time_str = $datetime->format('H:i');
                        $time_str2 = $datetime2->format('H:i');
                        ?>
                    <input type="time" autocomplete="off" class="form-control" id="description" name="startTime" placeholder="" value="{{ $time_str}}">
                  </div>  
                  <div class="form-group">
                    <label for="description">endTime</label>
                    <input type="time" autocomplete="off" class="form-control" id="description" name="endTime" placeholder="" value="{{ $time_str2 }}">
                  </div>  
                  <div class="form-group">
                    <label for="description">reason</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="reason" placeholder="" value="{{ $sections_info->reason}}">
                  </div> 


                     
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('shortmovementregister_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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