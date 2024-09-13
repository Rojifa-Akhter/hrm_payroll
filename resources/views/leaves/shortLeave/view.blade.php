
@extends('layouts.app')  

@section('content_header')
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Short Leave</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Leave</li>
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
            <h3 class="card-title">View Short Leave</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('update_shortleave') }}" >
            @csrf
            <div class="card-body">

            <div class="form-group">
                <label for="name">Employee Id</label>
                <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $leave_info->id }}" >
                <input type="text" autocomplete="off" class="form-control"  name="eid" placeholder="employer id" value="{{ $leave_info-> employeeId }}" readonly >
              </div>  

              <div class="form-group">
                <label for="code">Date</label>
                <input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder="Enter Short_Name" value="{{ $leave_info-> date}}" readonly>
              </div>  

              <div class="form-group">
                    <label for="End Time">Start time</label>
                    <input type="text" autocomplete="off" class="form-control" id="startTime" name="startTime" placeholder="Enter Start Time" value="{{ date('h:i A',strtotime($leave_info->startTime)) }}" readonly>
                    
                  
                  </div>

              <div class="form-group">
                    <label for="End Time">End Time</label>
                    <input type="text" autocomplete="off" class="form-control" id="endTime" name="endTime" placeholder="Enter End Time" value="{{ date('h:i A',strtotime($leave_info->endTime)) }}" readonly>

                  
                  </div>

              <div class="form-group">
                <label for="code">Reason</label>
                <input type="text" autocomplete="off" class="form-control" id="short_name" name="reason" placeholder="Enter Short_Name" value="{{ $leave_info-> reason}}" readonly>
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
              
              <a href="{{route('shortleave_list')}}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
              
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