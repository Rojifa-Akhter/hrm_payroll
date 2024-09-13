
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Confirm Attendances</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Confirm Attendances</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    @endsection  
      
    @section('main_content')

      <div class="col-md-1">
          <a style="" href="{{ route('confirmattendance_add') }}"><button type="button" class="btn btn-block btn-primary">Add</button></a>
      </div> 
      <br />
       <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Attendence List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Month</th>
                    <th>Working Days</th>
                    <th>Present Days</th>
                    <th>Absent Days</th>
                    <th>Payable Days</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($joined_data)){
                    foreach($joined_data as $data){  ?>
                        <tr>
                          <td>{{ $data->name }}</td>
                          <td>{{ $data->month }}</td>
                          <td>{{ $data->working_days }}</td>
                          <td>{{ $data->present_days }}</td>
                          <td>{{ $data->absent_days }}</td>
                          <td>{{ $data->payable_days }}</td>
                          
                          <td>
                            <!-- <a href="{{route('view_confirmattendance', $data->id)}}"><button type="button" class="btn  btn-sm btn-primary">View</button></a> -->
                            <a href="{{route('edit_confirmattendance', $data->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                            <a href="{{route('confirmattendance_delete', $data->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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