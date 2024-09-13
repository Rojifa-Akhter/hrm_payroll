
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
              <form method="post" action="{{ route('update_confirmattendance') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="department">Emloyee</label>
                   
                    <select name="employee_id" class="form-control">
                    <option value="">Select employee</option>
                      <?php foreach($departments as $dep){ ?>
                      <option <?php if($dep->id==$sections_info->emId) echo 'selected'; ?> value="{{ $dep->id }}">{{ $dep->name }}</option>
                      <?php } ?>
                     
                    </select>  
                  </div>

                  <div class="form-group">
                    <label for="description">Month</label>
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $sections_info->id }}" >
                    <input type="month" autocomplete="off" class="form-control" id="description" name="month" placeholder="" value="{{ $sections_info->month}}">
                  </div>  
                  <div class="form-group">
                    <label for="description">Working Days</label>
                    <input type="text" autocomplete="off" class="form-control" id="working_days" name="working_days" placeholder="" value="{{ $sections_info->working_days}}">
                  </div>  
                  <div class="form-group">
                    <label for="description">Present Days</label>
                    <input type="text" autocomplete="off" class="form-control" id="present_days" name="present_days" placeholder="" value="{{ $sections_info->present_days}}">
                  </div>  

                  <div class="form-group">
                    <label for="description">Absent Days</label>
                    <input type="text" autocomplete="off" class="form-control" id="absent_days" name="absent_days" placeholder="" value="{{ $sections_info->absent_days}}">
                  </div>  

                  <div class="form-group">
                    <label for="description">Payable Days</label>
                    <input type="text" autocomplete="off" class="form-control" id="payable_days" name="payable_days" placeholder="" value="{{ $sections_info->payable_days}}">
                  </div> 


                 

           
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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