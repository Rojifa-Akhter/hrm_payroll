@extends('layouts.app')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Employee</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Employee</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('main_content')

<div class="col-md-1">
  <a href="{{ route('employee.create') }}"><button type="button" class="btn btn-block btn-primary">Add</button></a>
</div>
<br />

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Employee List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Empl Id</th>
                <th>Name</th>
                <th>company Name</th>
                <th>Department</th>
                <th>desig_name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($employees)) {
                foreach ($employees as $emp) {  ?>
                  <tr>
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->employeeId }}</td>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->compani }}</td>
                    <td>{{ $emp->dept_name }}</td>
                    <td>{{ $emp->desig_name }}</td>
                    <td>
                      <a href="{{route('employee.view', $emp->id)}}"><button type="button" class="btn  btn-sm btn-primary">View</button></a>
                      <a href="{{route('employee.edit.service', $emp->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                      <a href="{{route('employee.destroy', $emp->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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