<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bali Arcade | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <link href="{{asset('backend/plugins/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('backend/plugins/toaster/toastr.min.css')}}">
   <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <a class="dropdown-item" href="{{ route('change.password') }}">
             Change Your Password
          </a>
        </div>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{URL::to('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Bali Arcade</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fas fa-user" style="color: white;font-size: 25px;"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>

          @if(Auth::user()->module == 'shop' || Auth::user()->type==1)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>
                  Shop
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if(Auth::user()->type==1)
                  <li class="nav-item">
                    <a href="{{ route('all.shopcategory') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Shop Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('all.shop') }}" class="nav-link">
                      <i class="fas fa-store nav-icon"></i>
                      <p>All Shop</p>
                    </a>
                  </li>
                @else

                  <li class="nav-item">
                  <a href="{{ route('all.product.category') }}" class="nav-link">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Product Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('all.shop.product') }}" class="nav-link">
                    <i class="fas fa-box-open nav-icon"></i>
                    <p>Product</p>
                  </a>
                </li>
                @endif


              </ul>
            </li>


          @endif

          @if(Auth::user()->module == 'carparking' || Auth::user()->type==1)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                  Car Parking
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

              </ul>
            </li>
          @endif

          @if(Auth::user()->module == 'food' || Auth::user()->type==1)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">

                <i class="nav-icon fas fa-hamburger"></i>
                <p>
                  Food Court
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if(Auth::user()->type==1)
                  <li class="nav-item">
                    <a href="{{ route('all.restaurant.category') }}" class="nav-link">
                      <i class="fas fa-list nav-icon"></i>
                      <p>Restaurant Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('all.restaurant') }}" class="nav-link">
                      <i class="fas fa-store nav-icon"></i>
                      <p>All Restaurant</p>
                    </a>
                  </li>
                @else

                          <li class="nav-item">
                          <a href="{{ route('all.menu.category') }}" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Menu Category</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('all.menu') }}" class="nav-link">
                            <i class="fas fa-utensils nav-icon"></i>
                            <p>Menu</p>
                          </a>
                        </li>

                @endif
                </ul>
                    </li>
          @endif

          @if(Auth::user()->module == 'cineplex' || Auth::user()->type==1)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-video"></i>
                <p>
                  CinePlex
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">


              </ul>
            </li>
          @endif
          @if(Auth::user()->type!=1)
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                 Pending Order
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="{{ route('today.pending.order') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Today Pending Order</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('all.pending.order') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Pending Order</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sync-alt"></i>
                <p>
                 Procesing Order
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="{{ route('today.processing.order') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Today Proccesing Order</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('all.processing.order') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Procesing Order</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-check-circle"></i>
                <p>
                 Complete Order
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="{{ route('today.complete.order') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Today Complete Order</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('all.complete.order') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Complete Order</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
           
          @if(Auth::user()->type == 1)
            <li class="nav-item has-treeview">
              <a href="{{ route('all.customer') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Customer
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{ route('all.advertisement') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    Advertisement
                    </p>
                </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('all.splash_screen') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Splash Screen
                        </p>
                    </a>
                </li>
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Auth::user()->type==1)
                <li class="nav-item">
                  <a href="{{ route('floor') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Floor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('make.admin') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Make Admin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('cache') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cache</p>
                  </a>
                </li>
              @else
                <li class="nav-item">
                  <a href="{{ route('info',Auth::user()->id) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Info</p>
                  </a>
                </li>

              @endif
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('admin_content')
    <!-- Content Header (Page header) -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-{{ date('Y') }} <a href="http://ringersoft.com">Ringer Soft Ltd</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- ./wrapper -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('backend/plugins/toaster/toastr.min.js')}}"></script>
<script src="{{asset('backend/plugins/sweet-alert/sweetalert.min.js')}}"></script>
@yield('script')
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable(
    // {
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // }

    );
  });
</script>
<script type="text/javascript">
/* ==============================================
Counter Up
=============================================== */
jQuery(document).ready(function($) {
  $('.counter').counterUp({
      delay: 100,
      time: 1200
    });
  });
</script>

<script>
  @if(Session::has('messege'))
    var type ="{{ Session::get('alert-type',session('type')) }}"
    switch(type){
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
      toastr.warning("{{ Session::get('messege') }}");
      break;
    }
  @endif
</script>
<script>
  $(document).on("click","#delete",function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
      title:"Are You Want To Delete ?",
      text:"Once Delete, This Will Permently Delete !",
      icon:"warning",
      buttons:true,
      dangerMode:true,
    })
    .then((willDelete)=>{
      if(willDelete){
        window.location.href=link;
      }else{
        swal("Safe Data !");
      }
    });
  });
</script>

<script type="text/javascript">
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $("#image").attr('src',e.target.result).width(100).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
  $(function () {
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select[name="shopcategory_id"]').on('change',function(){
      var shopcategory_id = $(this).val();
      if (shopcategory_id) {
        $.ajax({
          url:"{{ url('/baliarcade/admin/get/shop/') }}/"+shopcategory_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#shop_id").empty();
            $("#shop_id").append('<option selected="selected" disabled="">Select A Shop</option>');
            $.each(data,function(key,value){
              $("#shop_id").append('<option value="'+value.id+'"">'+value.name_en+' | '+value.name_bn+'</option>');
            });
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select[name="restaurantcategory_id"]').on('change',function(){
      var restaurantcategory_id = $(this).val();
      if (restaurantcategory_id) {
        $.ajax({
          url:"{{ url('/baliarcade/admin/get/restaurant/') }}/"+restaurantcategory_id,
          type:"GET",
          dataType:"json",
          success:function(data){
            $("#restaurant_id").empty();
            $("#restaurant_id").append('<option selected="selected" disabled="">Select A Restaurant</option>');
            $.each(data,function(key,value){
              $("#restaurant_id").append('<option value="'+value.id+'"">'+value.name_en+' | '+value.name_bn+'</option>');
            });
          }
        });
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('select[name="type"]').on('change',function(){
      var type = $(this).val();
      if (type == '0') {
        $('.module').removeClass('d-none');
      }else{
        $('.module').addClass('d-none');
        $('.shopcategory').addClass('d-none');
        $('.shop').addClass('d-none');
        $('.restaurantcategory').addClass('d-none');
        $('.restaurant').addClass('d-none');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('select[name="module"]').on('change',function(){
      var modules = $(this).val();
      if (modules == 'shop') {
        $('.shopcategory').removeClass('d-none');
        $('.shop').removeClass('d-none');
      }else{
        $('.shopcategory').addClass('d-none');
        $('.shop').addClass('d-none');
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select[name="module"]').on('change',function(){
      var modules = $(this).val();
      if (modules == 'food') {
        $('.restaurantcategory').removeClass('d-none');
        $('.restaurant').removeClass('d-none');
      }else{
        $('.restaurantcategory').addClass('d-none');
        $('.restaurant').addClass('d-none');
      }
    });
  });
</script>

</body>
</html>
