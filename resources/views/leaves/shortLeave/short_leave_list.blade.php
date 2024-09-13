
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

  <div class="col-md-1">
      <a style="" href="{{ route('shortleave_add') }}"><button type="button" class="btn btn-block btn-primary">Add</button></a>
  </div> 
  <br />
   <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Short Leave List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                
                <th>Employee</th>
                <th>Date</th>
                <th>StartTime</th>
                <th>EndTime</th>
                <th>Reason</th>
                <th>Action</th>
                
                
                
              </tr>
              </thead>
              <tbody>
                <?php 
                if(!empty($tbl_leave)){
                foreach($tbl_leave as $com){  ?>
                    <tr>
                      
                      <td>{{ $com->name}} ({{ $com->employeeId}})</td>
                      <td>{{ $com->date }}</td>
                      <td>{{ date('h:i A',strtotime($com->startTime))}}</td>
                      <td>{{ date('h:i A',strtotime($com->endTime)) }}</td>
                      <td>{{ $com->reason }}</td>
                      

                     
                      <td>
                        <a href="{{route('view_shortleave', $com->id)}}"><button type="button" class="btn  btn-sm btn-primary">View</button></a>
                        <a href="{{route('edit_shortleave', $com->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                        <a href="{{route('delete_shortleave', $com->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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