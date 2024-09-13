@extends('layouts.app')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Work Program</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Work Program</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('main_content')

    <div class="col-md-1">
        <a style="" href="{{ route('work_program_add') }}"><button type="button" class="btn btn-block btn-primary">Add</button></a>
    </div>
    <h2 style="text-align: center;color: #0c84ff">{{ session('message') }}</h2>

    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Work Program List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
{{--                                <th>employee_id</th>--}}
                                <th>date</th>
                                <th>Work Details</th>
{{--                                <th>subject</th>--}}
{{--                                <th>job</th>--}}
{{--                                <th>organization</th>--}}
{{--                                <th>venue</th>--}}
                                <th>Concern Type</th>
{{--                                <th>concern_employee</th>--}}
{{--                                <th>others</th>--}}
                                <th>deadline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($workProgramInfos)){
                            foreach($workProgramInfos as $workProgramInfo){  ?>
                            <tr>
{{--                                <td>{{ $workProgramInfo->employee_id }}</td>--}}
                                <td>{{ $workProgramInfo->date }}</td>
                                <td>{{ $workProgramInfo->job }}</td>
{{--                                <td>{{ $workProgramInfo->subject }}</td>--}}
{{--                                <td>{{ $workProgramInfo->organization }}</td>--}}
{{--                                <td>{{ $workProgramInfo->venue }}</td>--}}
                                <td>{{ $workProgramInfo->concern_type }}</td>
{{--                                <td>{{ $workProgramInfo->concern_type }}</td>--}}
{{--                                <td>{{ $workProgramInfo->concern_employee }}</td>--}}
{{--                                <td>{{ $workProgramInfo->others }}</td>--}}
                                <td>{{ $workProgramInfo->deadline }}</td>
                                <td>{{ $workProgramInfo->status }}</td>
                                <td>

                                   @if($workProgramInfo->status == 'Done')
                                        <a href="{{route('view_work_programs', $workProgramInfo->id)}}"><button type="button" class="btn  btn-sm btn-secondary">View</button></a>
                                        <a href="{{route('undone', $workProgramInfo->id)}}"><button type="button" class="btn  btn-sm btn-success">Undone</button></a>
                                    @else
                                        <a href="{{route('edit_work_program', $workProgramInfo->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                                        <a href="{{route('work_program_delete', $workProgramInfo->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
                                    @endif

                                    @if($workProgramInfo->status == 'Pending')
                                    <a href="{{route('done', $workProgramInfo->id)}}"><button type="button" class="btn  btn-sm btn-primary">Done</button></a>
                                        @endif
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
