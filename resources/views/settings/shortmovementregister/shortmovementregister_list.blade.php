
    @extends('layouts.app')  

    @section('content_header')
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Short Movement Register</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Short_Move</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    @endsection  
      
    @section('main_content')

      <div class="col-md-1">
          <a style="" href="{{ route('shortmovementregister_add') }}"><button type="button" class="btn btn-block btn-primary">Add</button></a>
      </div> 
      <br />
       <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Short_Move List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>

                     <th>emId</th>
                    <th>Employee Name</th>
                    <th>Date</th>
                   
                    <th>startTime</th>
                    <th>endTime</th>
                    <th>reason</th>
                   
                    
                    
                    <th>Change Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($attendances)){
                    foreach($attendances as $attd){  ?>
                        <tr>
                          <td>{{ $attd->emId}}</td>
                          <td>{{ $attd->name }}</td>
                          <td>{{ date('d-m-Y',strtotime($attd->date))}}</td>
                          
                          <td>{{ date('h:i A',strtotime($attd->startTime))}}</td>
                          <td>{{ date('h:i A',strtotime($attd->endTime))}}</td>
                          <td>{{ $attd->reason}}</td>
                        
                        
                          
                          
                          <td>
                            <a href="{{route('view_shortmovementregister', $attd->id)}}"><button type="button" class="btn  btn-sm btn-primary">View</button></a>
                            <a href="{{route('edit_shortmovementregister', $attd->id)}}"><button type="button" class="btn  btn-sm btn-success">Edit</button></a>
                            <a href="{{route('shortmovementregister_delete', $attd->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
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