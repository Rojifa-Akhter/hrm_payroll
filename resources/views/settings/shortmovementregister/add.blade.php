
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Short Movement Register</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Short_Move</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->


      <script>
        $(document).ready(function(){
          $('#add-btn').on('click',function(){
        
            $('.card-body').append(newRow);
              });
        });
      </script>





    @endsection  
      
    @section('main_content')


      
       <div class="container-fluid">
       
            <div class="row">
                <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Short Movement Register</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('shortmovementregister_add_action') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="employee_id">employee ID</label>
                   
                    <select name="employee_id" class="form-control">
                      <option value="">Select employee</option>
                        <?php foreach($employees as $emp){ ?>
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                        <?php } ?>
                      </select>   
                  </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder="">
                  </div>  
                 

                  <div class="form-group">
                    <label for="description">startTime</label>
                    <input type="time" autocomplete="off" class="form-control" id="timeIn" name="startTime" placeholder="">
                  </div>  

                  <div class="form-group">
                    <label for="timeOut">endTime</label>
                    <input type="time" autocomplete="off" class="form-control" id="timeOut" name="endTime" placeholder="">
                  </div>
                
          


                  <div class="form-group">
                    <label for="remarks">reason</label>
                    <input type="text" autocomplete="off" class="form-control" id="remarks" name="reason" placeholder="">
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