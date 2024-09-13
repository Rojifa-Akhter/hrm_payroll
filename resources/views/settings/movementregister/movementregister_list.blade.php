
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Movement Register</h1>
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

      <div class="col-md-1">
          <a style="" href="{{ route('movementregister_add') }}"><button type="button" class="btn btn-block btn-primary">Add</button></a>
      </div> 
      <br />
       <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Movement Register List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Employee Name</th>
                    
                    <th>Location Place</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Job/Task Details </th>
                    <th>Task Status</th>
                    <th>Action</th>
      
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($attendances)){
                    foreach($attendances as $attd){  ?>
                        <tr>
                          <td>{{ $attd->name }}</td>
                        
                          <td>{{ $attd->address}}</td>
                          <td>{{ date('d-m-Y',strtotime($attd->fromDate))}}</td>
                          <td>{{ date('d-m-Y',strtotime($attd->toDate))}}</td>
                          <td>{{ $attd->reason}}</td>
                          <td>{{ $attd->task_status}}</td>
                        
                        
                          
                          
                          <td>
                            <a href="{{route('view_movementregister', $attd->id)}}"><button type="button" class="btn  btn-sm btn-primary">View</button></a>
                            <a href="{{route('edit_movementregister', $attd->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                            <a href="{{route('movementregister_delete', $attd->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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