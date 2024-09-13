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

  <div class="row  d-flex  justify-content-center m-auto">

    <div class="col-12 col-sm-6 col-md-12">


      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Materials Employee</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper1">
                <div class="bs-stepper-header">
                  <!-- your steps here -->
                  <div class="step" data-target="#service-part">
                    <a class="step-trigger btn " href="{{ route('employee.edit.service', $id) }}">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Service</span>
                    </a>
                  </div>



                  <div class="step" data-target="#personal-part">
                    <a class="step-trigger btn " href="{{ route('create.personal', $id) }}">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Personal</span>
                    </a>
                  </div>

                  <div class="step" data-target="#contact-part">
                    <a class="step-trigger btn" href="{{ route('create.contact', $id) }}">
                      <span class="bs-stepper-circle">3</span>
                      <span class="bs-stepper-label">Contact</span>
                    </a>
                  </div>

                  <div class="step" data-target="#academic-part">
                    <a class="step-trigger btn" href="{{ route('list.academic', $id) }}">
                      <span class="bs-stepper-circle">4</span>
                      <span class="bs-stepper-label">Academic</span>
                    </a>
                  </div>

                  <div class="step   active" data-target="#materials-part">
                    <a class="step-trigger btn" href="{{ route('list.materials', $id) }}">
                      <span class="bs-stepper-circle">5</span>
                      <span class="bs-stepper-label">Materials</span>
                    </a>
                  </div>

                  <div class="step" data-target="#performance-part">
                    <a class="step-trigger btn" href="{{ route('list.performance', $id) }}">
                      <span class="bs-stepper-circle">6</span>
                      <span class="bs-stepper-label">Performance</span>
                    </a>
                  </div>

                  <div class="step" data-target="#ttr-list-part">
                    <a class="step-trigger btn" href="{{ route('list.transfer', $id) }}">
                      <span class="bs-stepper-circle">7</span>
                      <span class="bs-stepper-label">TTR List</span>
                    </a>
                  </div>

                  <div class="step" data-target="#discipline-part">
                    <a class="step-trigger btn" href="{{ route('list.disipline', $id) }}">
                      <span class="bs-stepper-circle">8</span>
                      <span class="bs-stepper-label">Discipline</span>
                    </a>
                  </div>

                  <div class="step" data-target="#resigned-part">
                    <a class="step-trigger btn" href="{{ route('list.resigned', $id) }}">
                      <span class="bs-stepper-circle">9</span>
                      <span class="bs-stepper-label">Resigned</span>
                    </a>
                  </div>
                </div>


                <div class="bs-stepper-content">
                  <!-- /.Add modal Start-->
                  <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#add_materials">
                    Add Materials
                  </button>
                  <div class="modal fade" id="add_materials">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Insert Material</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('employee.store.materials') }}" id="employeeForm" onsubmit="return validateForm()">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="id" value="{{ $id }}" />
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Materials Name</label>
                                    <select class="form-control" name="materials" id="materials">
                                    <option value="">Enter Materials</option>
                                      <option value="pen">Pen</option>
                                      <option value="khata">khata</option>
                                      <option value="book">book</option>
                                      <option value="furniture">furniture</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Qty</label>
                                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Qty">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Issue Date</label>
                                    <input type="date" class="form-control" id="issue_date" name="issue_date" placeholder="Enter issue date">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Warranty</label>
                                    <input type="date" class="form-control" id="Warranty" name="warranty" placeholder="Enter Warranty">
                                  </div>

                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea type="text" rows="8" cols="1" class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
                                  </div>


                                </div>

                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="" class="btn btn-primary">Go List</a>&nbsp;
                                      <button type="submit" class="btn btn-success">Submit &next</button>
                                    </div>
                                    <div class="col-md-6 text-right">
                                      <!-- <button type="submit" class="btn btn-success">Next</button> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </form>
                        </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- /.Add modal End-->


                  <!-- /.Edit modal Start-->

                  <div class="modal fade" id="materials_edit">
                    <div class="modal-dialog">
                      <div class="modal-content bg-info">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit material</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="{{ route('update.materials') }}" id="employeeForm">
                            @csrf
                            <div id="service-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                              <div class="row">

                                <input type="hidden" name="id" id="mat_id" value=""/>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Materials Name</label>
                                    <select class="form-control" name="materials" id="edit_mateName">
                                      <option value="">Enter Materials</option>
                                      <option value="pen">Pen</option>
                                      <option value="khata">khata</option>
                                      <option value="book">book</option>
                                      <option value="furniture">furniture</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Qty</label>
                                    <input type="text" autocomplete="off" class="form-control" id="edit_qty" name="qty" placeholder="Enter Qty">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Issue Date</label>
                                    <input type="date" autocomplete="off" class="form-control" id="edit_issueDate" name="issue_date" placeholder="Enter issue date">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Warranty</label>
                                    <input type="date" autocomplete="off" class="form-control" id="edit_warranty" name="warranty" placeholder="Enter Warranty">
                                  </div>

                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Price</label>
                                    <input type="text" autocomplete="off" class="form-control" id="edit_price" name="price" placeholder="Enter Price">
                                  </div>
                                  <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea type="text" autocomplete="off" rows="8" cols="1" class="form-control" id="edit_description" name="description" placeholder="Enter description"></textarea>
                                  </div>


                                </div>

                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <a href="" class="btn btn-primary">Go List</a>&nbsp;
                                      <button type="submit" class="btn btn-success">Submit &next</button>
                                    </div>
                                    <div class="col-md-6 text-right">
                                      <!-- <button type="submit" class="btn btn-success">Next</button> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </form>
                        </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- /.Edit modal End-->

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Empl Id</th>
                        <th>Materials Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Issue Date</th>
                        <th>Warranty</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (!empty($materials_info)) {
                        foreach ($materials_info as $material) {  ?>
                          <tr>
                            <td>{{ $material->id }}</td>
                            <td>{{ $material->employeeId }}</td>
                            <td>{{ $material->material_name }}</td>
                            <td>{{ $material->price }}</td>
                            <td>{{ $material->qty }}</td>
                            <td>{{ $material->issueDate }}</td>
                            <td>{{ $material->warranty }}</td>
                            <td>{{ $material->description }}</td>
                            <td>
              
                              <button type="button" class="btn  btn-sm btn-success" data-toggle="modal" id="material_btn" data-target="#materials_edit" onclick="editMaterial(<?php echo  $material->id ?>);">Edit</button>
                              <a href="{{route('materials.delete', $material->id)}}"><button type="button" class="btn  btn-sm btn-danger">Delete</button></a>
                            </td>
                          </tr>
                      <?php
                        }
                      } ?>

                      </tfoot>
                  </table>


                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div>
    <!-- /.card -->
  </div>
</div>

</div>


</div>
<!-- /.row -->


<!-- /.row -->
</div>
<!-- /.container-fluid -->


@endsection