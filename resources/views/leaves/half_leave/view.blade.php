
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Half Leave</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Half Leave</li>
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
                <h3 class="card-title">View Half Leave</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" >
                @csrf
                <div class="card-body">

                <!-- <div class="form-group">
                    <label for="ID">Leave ID</label>
                    <input type="number" autocomplete="off" class="form-control" id="id" name="id" placeholder="Enter Leave ID" value="{{ $halfLeave_info->id }}" readonly>
                  </div>   -->

                  <div class="form-group">
                    <label for="Employee ID">Employee ID</label>
                    <input type="number" autocomplete="off" class="form-control" id="eid" name="eid" placeholder="Enter Employee ID" value="{{ $halfLeave_info->employeeId }}" readonly>
                  </div> 

                  <div class="form-group">
                    <label for="Date">Leave Date</label>
                    <input type="date" autocomplete="off" class="form-control" id="date" name="date" placeholder="Enter Leave Date" value="{{ $halfLeave_info->date }}" readonly>
                  </div>  

                <div class="form-group">
                    <label for="Start Time">Start Time</label>
                    <input type="text" autocomplete="off" class="form-control" id="startTime" name="startTime" placeholder="Enter Start Time" value="{{ date('h:i A',strtotime($halfLeave_info->startTime)) }}" readonly > 
                    
                  </div>  
                  <div class="form-group">
                    <label for="End Time">End Time</label>
                    <input type="text" autocomplete="off" class="form-control" id="endTime" name="endTime" placeholder="Enter End Time" value="{{ date('h:i A',strtotime($halfLeave_info->endTime)) }}" readonly>
                  </div>  

                  <div class="form-group">
                    <label for="Reason">Leave Reason</label>
                    <input type="text" autocomplete="off" class="form-control" id="reason" name="reason" placeholder="Enter Reason" value="{{ $halfLeave_info->reason }}" readonly>
                  </div> 

                  <div class="form-group">
                    <label for="Status">Leave Status</label>
                    <input type="text" autocomplete="off" class="form-control" id="status" name="status" placeholder="Enter Leave Status" value="{{ $halfLeave_info->status }}" readonly>
                  </div>  

                <!-- <div class="form-group">
                    <label for="Approver Name">Approver Name</label>
                    <input type="text" autocomplete="off" class="form-control" id="approverName" name="approverName" placeholder="Enter Approver Name" value="{{ $halfLeave_info->approver_name }}" readonly>
                  </div>   -->

                 
                <!-- <div class="form-group">
                    <label for="Approver ID">Approver ID</label>
                    <input type="number" autocomplete="off" class="form-control" id="approverID" name="approverID" placeholder="Enter Approver ID" value="{{ $halfLeave_info->approver_id }}" readonly>
                  </div>   -->

                  

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
                  
                  <a href="{{ route('halfLeave_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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