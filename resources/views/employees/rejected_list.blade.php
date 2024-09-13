
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



    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rejected List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Mobile No.</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rejectedEloployees as $rejectedEloployee)
                                <tr>
                                    <td>{{$rejectedEloployee->name}}</td>
                                    <td>{{$rejectedEloployee->desig_name}}</td>
                                    <td>{{$rejectedEloployee->dept_name}}</td>
                                    <td>{{$rejectedEloployee->phone}}</td>
                                    <td>
                                    <td>
                                        <a href="{{route('activate_rejected', $rejectedEloployee->id)}}"><button type="button" class="btn  btn-sm btn-success">Activate</button></a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
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
