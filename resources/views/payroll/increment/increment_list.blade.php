
@extends('layouts.app')  

@section('content_header')
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Increment</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Increment</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection  
  
@section('main_content')

  <div class="col-md-1">
      <a style="" href="{{ route('increment_add') }}"><button type="button" class="btn btn-block btn-primary">Add</button></a>
  </div> 
  <br />
   <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Increment List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
              <thead>
              <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Increment Date</th>
                <th>Gross Increment</th>
                <th>Other Allowance</th>
                <th>Net Gross Increment</th>
              
                <th>Others Increment</th>
                <th>Salary Increment</th>
                <th>Total Increment</th>

                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                if(!empty($tbl_increments)){
                foreach($tbl_increments as $com){  ?>
                    <tr>
                
                      <td>{{$com->emId}}</td>
                      <td>{{ $com->name}}</td>
                      <td>{{ $com->increment_date }}</td>
                      <td>{{ $com->gross }}</td>
                      <td>{{ $com->Others }}</td> 
                      <td>{{ $com->net_gross }}</td>
                 
                      <td>{{ $com->salary_increment_amount }}</td>
                      <td>{{ $com->others_increment_amount }}</td>
                      <td>{{ $com->total_increment_amount }}</td>




                      
                      <td>
                        <a href="{{route('view_increment', $com->id)}}"><button type="button" class="btn  btn-sm btn-primary">View</button></a>
                        <a href="{{route('edit_increment', $com->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                        <a href="{{route('increment_delete', $com->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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