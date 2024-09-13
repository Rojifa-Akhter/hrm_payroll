
@extends('layouts.app')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Shift</h1>
                <h2 style="text-align: center;color: #0c84ff">{{ session('message') }}</h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Shift</li>
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
                        <h3 class="card-title">Edit Shift</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('update_shift') }}" >
                        <input type="hidden" name="id" value="{{$shift_info->id}}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">shift</label>
                                <input type="text" autocomplete="off" class="form-control" id="name" name="shift" placeholder="shift" value="{{ $shift_info-> shift}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="code">shiftCode</label>
                                <input type="text" autocomplete="off" class="form-control" id="code" name="shiftCode" placeholder="shiftCode" value="{{ $shift_info-> shiftCode}}" readonly>
                            </div>

                          <div class="form-group">
                               <label for="address">Start Time</label>
                                <input type="text" autocomplete="off" class="form-control" id="startTime" name="startTime" placeholder="startTime" value="{{ $shift_info-> startTime}}" readonly>
                            </div>

                           <div class="form-group">
                                <label for="address">End Time</label>
                                <input type="text" autocomplete="off" class="form-control" id="endTime" name="endTime" placeholder="endTime" value="{{ $shift_info-> endTime}}" readonly>                           
                             </div>
<!-- 
                            <div class="form-group">
                                <label for="address">weekend</label>
                                <input type="text" autocomplete="off" class="form-control" id="address" name="weekend" placeholder="weekend" value="{{ $shift_info-> weekend}}">
                            </div>

                            <div class="form-group">
                                <label for="address">toShift</label>
                                <input type="text" autocomplete="off" class="form-control" id="address" name="toShift" placeholder="toShift" value="{{ $shift_info-> toShift}}">
                            </div> -->

                            <!-- <div class="form-group">
                                <label for="address">intimeRange</label>
                                <input type="text" autocomplete="off" class="form-control" id="address" name="intimeRange" placeholder="intimeRange" value="{{ $shift_info-> intimeRange}}">
                            </div>

                            <div class="form-group">
                                <label for="address">outtimeRange</label>
                                <input type="text" autocomplete="off" class="form-control" id="address" name="outtimeRange" placeholder="outtimeRange" value="{{ $shift_info-> outtimeRange}}">
                            </div> -->

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
                            <a href="{{ route('shift_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>

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
