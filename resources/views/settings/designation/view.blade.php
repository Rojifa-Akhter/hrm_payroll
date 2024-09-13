
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Designation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Designation</li>
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
                <h3 class="card-title">View Designation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_designation') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="name">Designation Name</label>
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $desination_info->id }}" >
                    <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Designaton Name" value="{{ $desination_info->desig_name }}" readonly>
                  </div>  

                  <div class="form-group">
                    <label for="code">Designation Description</label>
                    <input type="text" autocomplete="off" class="form-control" id="Description" name="Description" placeholder="Enter Designation Info" value="{{ $desination_info->desig_description }}" readonly>
                  </div>  

                <div class="form-group">
                    <label for="address">Designation Rank</label>
                    <input type="number" autocomplete="off" class="form-control" id="rank" name="rank" placeholder="Enter Designation Rank" value="{{ $desination_info->desig_rank }}" readonly>
                  </div>  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation Short Name</label>
                    <input type="text" autocomplete="off" class="form-control" id="sname" name="sname" placeholder="Enter Designation Short Name" value="{{ $desination_info->desig_short_name }}" readonly>
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
                  
                  <a href="{{ route('designation_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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