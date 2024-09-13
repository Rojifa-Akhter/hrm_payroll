
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Type</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Leave Type</li>
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
                <h3 class="card-title">View Leave Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_leavetype') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="name">Leave Name</label>
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $leavetype_info->id }}" >
                    <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Enter Leave Name" value="{{ $leavetype_info->name }}" readonly>
                  </div>  

                  <div class="form-group">
                    <label for="Short Name">Leaves Short Name</label>
                    <input type="text" autocomplete="off" class="form-control" id="sname" name="sname" placeholder="Enter Leaves Short Name" value="{{ $leavetype_info->short_name }}" readonly>
                  </div> 

                  <div class="form-group">
                    <label for="code">Leave Description</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="description" placeholder="Enter Leaves Description" value="{{ $leavetype_info->description }}" readonly>
                  </div>  

                <div class="form-group">
                    <label for="address">Allowed Leave</label>
                    <input type="number" autocomplete="off" class="form-control" id="allow" name="allow" placeholder="Enter Allowed Leave" value="{{ $leavetype_info->allowedLeave }}" readonly>
                  </div>  

                  

            <!--
                  <div class="form-group">
                    <label for="exampleInputFile">Company Logo</label>
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
                  
                  <a href="{{ route('leavetype_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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