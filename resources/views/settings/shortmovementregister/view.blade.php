
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Short_Move</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-rigsection_ht">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Short_Move</li>
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
                <h3 class="card-title">View Short_Move</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('update_shortmovementregister') }}" >
                @csrf
                <div class="card-body">
                <label for="department">attendace ID</label>
                   
                   <select name="department" class="form-control">
                   <option value="">Select employee</option>
                     <?php foreach($departments as $dep){ ?>
                     <option <?php if($dep->employeeId==$sections_info->employeeId) echo 'selected'; ?> value="{{ $dep->id }}">{{ $dep->name }}</option>
                     <?php } ?>
                    
                   </select>  
                 </div>
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
                    <label for="description">emId</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="emId" placeholder="" value="{{ $sections_info->emId }}">
                  </div>    
                  
                  <div class="form-group">
                    <label for="description">startTime</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="startTime" placeholder="" value="{{ $sections_info->startTime }}">
                  </div>  

                  <div class="form-group">
                    <label for="description">endTime</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="endTime" placeholder="" value="{{ $sections_info->endTime }}">
                  </div>  

                  <div class="form-group">
                    <label for="description">reason</label>
                    <input type="text" autocomplete="off" class="form-control" id="description" name="reason" placeholder="" value="{{ $sections_info->reason }}">
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
                  
                  <a href="{{ route('shortmovementregister_list') }}">  <button type="button" class="btn btn-primary">Go Back</button> </a>
                  
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