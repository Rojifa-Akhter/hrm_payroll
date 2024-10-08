
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Section</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Section</li>
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
                <h3 class="card-title">Add Section</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('section_add_action') }}" >
                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="department_id">Department ID</label>
                   
                    <select name="department_id" class="form-control">
                    <option value="">Select Department</option>
                      <?php foreach($departments as $dep){ ?>
                      <option value="{{ $dep->id }}">{{ $dep->dept_name }}</option>
                      <?php } ?>
                    </select>  
                  </div>

                <div class="form-group">
                    <label for="section_name">Section Name</label>
                    <input type="text" autocomplete="off" class="form-control" id="section_name" name="section_name" placeholder="">
                  </div>  

                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="description" placeholder="">
                  </div>  


                  <!-- <div class="form-group">
                    <label for="company_id">company_id</label>
                    <input type="text" autocomplete="off" class="form-control" id="company_id" name="company_id" placeholder="">
                  </div>      -->

            <!--
                  <div class="form-group">
                    <label for="exampleInputFile">banks Logo</label>
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <a href="{{ route('sections_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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