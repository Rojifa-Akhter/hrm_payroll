
@extends('layouts.app')  

@section('content_header')
   <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Leave Report List</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Payroll Report</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection  
  
@section('main_content')

  <div class="col-md-1">
      
  </div> 
  <br />
   <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Payroll Report List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover table-striped">
              <thead>
              <tr>
                <th>SL.</th>
                <th>Report Name</th>
                
               
              </tr>
              </thead>
              <tbody>
               
                    <tr>
                
                      <td>1</td>
                      <td><a href="{{route('masterSalaryReport_list')}}" target="_blank">Master Salary Report</a></td>
                      
                    </tr>

                     <tr>
                
                      <td>2</td>
                      <td><a href="{{route('daily_half_leave_report_list')}}" target="_blank">Approval Salary Report</a></td>
                      
                    </tr>

                     <tr>
                
                      <td>3</td>
                      <td><a href="{{route('daily_short_leave_report_list')}}" target="_blank">Bank Salary  Report</a></td>
                      
                    </tr>

                     <tr>
                
                      <td>4</td>
                      <td><a href="{{route('daily_short_leave_report_list')}}" target="_blank">Cash Salary  Report</a></td>
                      
                    </tr>
               
              
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