
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subsection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Subsection</li>
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
                <h3 class="card-title">View Subsection</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" >
                @csrf
                <div class="card-body">

                
                    <input type="hidden" autocomplete="off" class="form-control" id="id" name="id" placeholder="Enter subsection ID" value="{{ $subsectioninfo->id }}" readonly>
                 

                  <div class="form-group">
                    <label for="section">Sub Section</label>
                    <input type="number" autocomplete="off" class="form-control" id="section" name="section" placeholder="Enter Section " value="{{ $subsectioninfo->section }}" readonly>
                  </div> 

                  <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" autocomplete="off" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $subsectioninfo->name }}" readonly>
                  </div>  

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="description" placeholder="Enter Description" value="{{ $subsectioninfo->description }}" readonly > 
                    
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
                  
                  <a href="{{ route('subsection_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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