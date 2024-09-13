
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">attendances</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-rigsection_ht">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">attendances</li>
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
                <h3 class="card-title">View attendances</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_confirmattendance') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="section_name">employeeId</label>
                    <input type="hidden"  class="form-control" id="id" name="id"  value="{{ $sections_info->id }}" >
                    <input type="text" autocomplete="off" class="form-control" id="section_name" name="employeeId" placeholder="" value="{{ $sections_info->employeeId }}" >
                  </div>  

                  <div class="form-group">
                    <label for="department">date</label>
                    <input type="text" autocomplete="off" class="form-control" id="department" name="date" placeholder="" value="{{ $sections_info->date}}">
                  </div>  

                <div class="form-group">
                    <label for="description">timeIn</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="timeIn" placeholder="" value="{{ $sections_info->timeIn }}">
                  </div>    
                  
                  <div class="form-group">
                    <label for="description">timeOut</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="timeOut" placeholder="" value="{{ $sections_info->timeOut }}">
                  </div>  

                  <div class="form-group">
                    <label for="description">overTime</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="overTime" placeholder="" value="{{ $sections_info->overTime }}">
                  </div>  

                  <div class="form-group">
                    <label for="description">remarks</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="remarks" placeholder="" value="{{ $sections_info->remarks }}">
                  </div>  

            <!--
                  <div class="form-group">
                    <label for="exampleInputFile">section Logo</label>
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
                  
                  <a href="{{ route('confirmattendances_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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