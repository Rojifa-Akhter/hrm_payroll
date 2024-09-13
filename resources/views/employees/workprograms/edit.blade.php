
    @extends('layouts.app')

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Work Program</h1>
              <h2 style="text-align: center;color: #0c84ff">{{ session('message') }}</h2>
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



       <div class="container-fluid">

            <div class="row">
                <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Work programs</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_work_program') }}" >
                  <input type="hidden" name="id" value="{{$workProgramInfo->id}}">
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="name">Date</label>
                    <input type="date" class="form-control" id="name" name="dept_name" placeholder="Date" value="{{ $workProgramInfo->date }}" >
                  </div>

                  <div class="form-group">
                    <label for="code">Dead Line</label>
                    <input type="date" class="form-control" id="code" name="deadline" placeholder="dept_name" value="{{ $workProgramInfo->deadline }}">
                  </div>

                <div class="form-group">
                    <label for="address">Concern Type</label>
                    <input type="text" class="form-control" id="address" name="concern_type" placeholder="dep_description" value="{{ $workProgramInfo->concern_type }}">
                  </div>


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
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('work_program_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>

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
