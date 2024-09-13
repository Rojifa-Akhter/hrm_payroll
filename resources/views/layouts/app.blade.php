<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HR Payroll| Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ static_asset('assets/plugins/fontawesome-free/css/all.min.css') }}" >
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ static_asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" >
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ static_asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" >
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ static_asset('assets/plugins/jqvmap/jqvmap.min.css') }}" >
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ static_asset('assets/dist/css/adminlte.min.css') }}" >
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ static_asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" >
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ static_asset('assets/plugins/daterangepicker/daterangepicker.css') }}" >
  <!-- summernote -->
  <link rel="stylesheet" href="{{ static_asset('assets/plugins/summernote/summernote-bs4.min.css') }}" >

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  

<!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ static_asset('assets') }}/dist/css/adminlte.min.css">





</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ static_asset('assets/dist/img/AdminLTELogo.png') }}"  alt="AdminLTELogo" height="60" width="60">
  </div>

  

@include('inc.navbar')


@include('inc.sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      @yield('content_header')
     
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('main_content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @include('inc.footer')

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ static_asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ static_asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" ></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ static_asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
<!-- ChartJS -->
<script src="{{ static_asset('assets/plugins/chart.js/Chart.min.js') }}" ></script>
<!-- Sparkline -->
<script src="{{ static_asset('assets/plugins/sparklines/sparkline.js') }}" ></script>
<!-- JQVMap -->
<script src="{{ static_asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}" ></script>
<script src="{{ static_asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}" ></script>
<!-- jQuery Knob Chart -->
<script src="{{ static_asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}" src=""></script>
<!-- daterangepicker -->
<script src="{{ static_asset('assets/plugins/moment/moment.min.js') }}" ></script>
<script src="{{ static_asset('assets/plugins/daterangepicker/daterangepicker.js') }}" ></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ static_asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}" ></script>
<!-- Summernote -->
<script src="{{ static_asset('assets/plugins/summernote/summernote-bs4.min.js') }}" ></script>
<!-- overlayScrollbars -->
<script src="{{ static_asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}" ></script>
<!-- AdminLTE App -->
<script src="{{ static_asset('assets/dist/js/adminlte.js') }}" ></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ static_asset('assets/dist/js/demo.js') }}" ></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ static_asset('assets/dist/js/pages/dashboard.js') }}" ></script>


<!-- DataTables  & Plugins -->
<script src="{{ static_asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ static_asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



<!-- bootstrap color picker -->
<script src="{{ static_asset('assets') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ static_asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ static_asset('assets') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{ static_asset('assets') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{ static_asset('assets') }}/plugins/dropzone/min/dropzone.min.js"></script>


<script>
    $(document).on("click", ".delete", function(e) {
      e.preventDefault();
      var link = $(this).attr("href");
      swal({
          title: "Are you sure you want to delete?",
          text: "Once deleted, this will be permanently deleted!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = link;
          } else {
            swal("Safe Data!");
          }
        });
    });
  </script>

  <script>
    @if(Session::has('messege'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
      case 'info':
        toastr.info("{{ Session::get('messege') }}");
        break;
      case 'success':
        toastr.success("{{ Session::get('messege') }}");
        break;
      case 'warning':
        toastr.warning("{{ Session::get('messege') }}");
        break;
      case 'error':
        toastr.error("{{ Session::get('messege') }}");
        break;
    }

    @endif
  </script>






  <!-- <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script> -->
  <script>
    $(function() {
      $("#datepicker").datepicker({
        autoclose: true,
        todayHighlight: true
      }).datepicker('update', new Date());
    });
  </script>
  <script>
    $(function() {
      $("#datepicker1").datepicker({
        autoclose: true,
        todayHighlight: true
      }).datepicker('update', new Date());
    });
  </script>
  <script>
    $(function() {
      $("#datepicker2").datepicker({
        autoclose: true,
        todayHighlight: true
      }).datepicker('update', new Date());
    });
  </script>





  <script type="text/javascript">
    $('#ser_section').on('change', function() {
      var sec_id = $('#ser_section').val();

      //var url = "http://localhost/hrm_payroll2/employee/add"+sec_id;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{route('employee.subsection')}}",
        data: {
          'sec_id': sec_id
        },
        dataType: "JSON",
        success: function(res) {
          //alert('test');
          // amusing res = {"3":"home","4":"home duplex"}; 
          var html = "";
          $.each(res.subsection, function(key, value) {

            html += "<option value=" + value.id + ">" + value.name + "</option>";
          });
          $("#ser_sub_section").html(html);
        }
      });
    });
  </script>

  <script type="text/javascript">
    function editAcademic(id) {

      acad_id = id;
      //alert(id)


      //var url = "http://localhost/hrm_payroll2/employee/add"+sec_id;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{route('info.academic')}}",
        data: {
          'acad_id': acad_id
        },
        dataType: "JSON",
        success: function(res) {

          $('#ac_id').val(res.academic_info[0].id);
          //alert(res.academic_info[0].id);
          $('#edit_institute').val(res.academic_info[0].institute);
          $('#edit_passing_year').val(res.academic_info[0].passing_year);
          $('#edit_result').val(res.academic_info[0].result);


          option = '<option value="' + res.academic_info[0].exam_title + '">' + res.academic_info[0].exam_title + '</option>';



          $('[id=edit_exam_title]').append(option);
          $('[id=edit_exam_title]').val(res.academic_info[0].exam_title);

          // $('#edit_exam_title').html();

          $('#academic_edit').modal('show');


        }
      });
    }
  </script>



  <script type="text/javascript">
    function editMaterial(id) {

      mate_id = id;
      //alert(id)


      //var url = "http://localhost/hrm_payroll2/employee/add"+sec_id;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{route('materials.info')}}",
        data: {
          'mate_id': mate_id
        },
        dataType: "JSON",
        success: function(res) {

          $('#mat_id').val(res.material_info[0].id);
          //alert(res.academic_info[0].id);
          $('#edit_mateName').val(res.material_info[0].material_name);
          $('#edit_qty').val(res.material_info[0].qty);
          $('#edit_issueDate').val(res.material_info[0].issueDate);
          $('#edit_warranty').val(res.material_info[0].warranty);
          $('#edit_price').val(res.material_info[0].price);
          $('#edit_description').val(res.material_info[0].description);

          option = '<option value="' + res.material_info[0].material_name + '">' + res.material_info[0].material_name + '</option>';



          $('[id=edit_mateName]').append(option);
          $('[id=edit_mateName]').val(res.material_info[0].material_name);

          // $('#edit_exam_title').html();

          $('#materials_edit').modal('show');


        }
      });
    }
  </script>

  <script type="text/javascript">
    function editPerformance(id) {

      per_id = id;
      //alert(id)


      //var url = "http://localhost/hrm_payroll2/employee/add"+sec_id;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{route('performances.info')}}",
        data: {
          'per_id': per_id
        },
        dataType: "JSON",
        success: function(res) {

          $('#per_id').val(res.performance_info[0].id);
          $('#edit_year').val(res.performance_info[0].year);
          $('#edit_puntuality').val(res.performance_info[0].puntuality);
          $('#edit_job_knowledge').val(res.performance_info[0].job_knowledge);
          $('#edit_initiative').val(res.performance_info[0].initiative);
          $('#edit_attendace').val(res.performance_info[0].attendace);
          $('#edit_ednQualification').val(res.performance_info[0].ednQualification);
          $('#edit_honesty').val(res.performance_info[0].honesty);
          $('#edit_sincerity').val(res.performance_info[0].sincerity);
          $('#edit_lengthOfService').val(res.performance_info[0].lengthOfService);
          $('#edit_customerFocus').val(res.performance_info[0].customerFocus);
          $('#edit_CommSkill').val(res.performance_info[0].CommSkill);
          $('#edit_professionalism').val(res.performance_info[0].professionalism);
          $('#edit_behaviour').val(res.performance_info[0].behaviour);
          $('#edit_goal').val(res.performance_info[0].goal);
          $('#edit_pdd').val(res.performance_info[0].pdd);


          $('#performances_edit').modal('show');


        }
      });
    }
  </script>


  <script type="text/javascript">
    function editDisipline(id) {

      dis_id = id;
      //alert(id);


      //var url = "http://localhost/hrm_payroll2/employee/add"+sec_id;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{route('disiplines.info')}}",
        data: {
          'dis_id': dis_id
        },
        dataType: "JSON",
        success: function(res) {
          // alert('test');
          $('#dis_id').val(res.disipline_info[0].id);
          $('#edit_type').val(res.disipline_info[0].type);
          $('#edit_ref_number').val(res.disipline_info[0].ref_number);
          $('#edit_date').val(res.disipline_info[0].date);
          $('#edit_reason').val(res.disipline_info[0].reason);


          // $('#edit_exam_title').html();

          $('#discipline_edit').modal('show');


        }
      });
    }
  </script>


  


  <script type="text/javascript">
    function editTransfersl(id) {

      tra_id = id;
      //alert(id)


      //var url = "http://localhost/hrm_payroll2/employee/add"+sec_id;
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "{{route('transfers.info')}}",
        data: {
          'tra_id': tra_id
        },
        dataType: "JSON",
        success: function(res) {

          $('#tra_id').val(res.transfer_info[0].id);
          //alert(res.academic_info[0].id);
          $('#edit_date').val(res.transfer_info[0].date);

          // option= '<option value="'+res.performance_info[0].company+'">'+res.performance_info[0].name+'</option>';
          // $('#edit_company').append(option);
          $('#edit_company').val(res.transfer_info[0].company);
          $('#edit_department').val(res.transfer_info[0].department);
          $('#edit_designation').val(res.transfer_info[0].designation);
          $('#edit_Shift').val(res.transfer_info[0].shift);
          $('#edit_section').val(res.transfer_info[0].section);
          $('#edit_reason').val(res.transfer_info[0].reason);


          $('#transfer_edit').modal('show');


        }
      });
    }
  </script>


</body>
</html>
