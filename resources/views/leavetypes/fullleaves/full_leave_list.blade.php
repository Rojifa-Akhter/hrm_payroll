
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Full Leave </h1>
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

      <div class="col-md-3">
          <a style="" href="{{ route('full_leave_add') }}"><button type="button" class="btn btn-block btn-info">Add Leave</button></a>
      </div> 
      <h6 class="text-center text-success ">{{session('message')}}</h6>
      <br />
       <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Leave List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>ID</th>
                    <th>Employee</th>
                    <th>leave_type</th>
                    <th>startDateLeave</th>
                    <th>endDateLeave</th>
                     <th>leaveDay</th>
                     <th>leave_reason</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($leave)){
                    foreach($leave as $leave){  ?>
                        <tr>
                        <td>{{ $leave->id }}</td>
                          <td>{{ $leave->name }}</td>
                          <td>{{ $leave->leave_type_name}}</td>
                          <td>{{ $leave->startDateLeave }}</td>
                          <td>{{ $leave->endDateLeave }}</td>
                          <td>{{ $leave->leaveDay }}</td>
                          <td>{{ $leave->leave_reason }}</td>
                          <td>


                              


                            <a href="{{route('view_full_leave', $leave->id)}}"><button type="button" class="btn  btn-sm btn-primary">View</button></a>
                            <a href="{{route('edit_full_leave', $leave->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                            <a href="{{route('full_leave_delete', $leave->id)}}" onclick="return confirm('Are you sure!')"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
                          </td>
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