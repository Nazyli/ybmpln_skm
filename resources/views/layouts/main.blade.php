@php
use App\Http\Controllers\PendaftarController;

function isActiveLink($text) {
if(\Request::is($text) or \Request::is($text.'/*')) {
return "active";
}else {
return null;
}
}
function breadcrumb($breadcrumb){
$breadcrumbSplit = explode(",",$breadcrumb);
  foreach($breadcrumbSplit as $i =>$key) {
    if ($i == 0){
      echo '<li class="breadcrumb-item"><a href="'.url('/home').'">'.$key.'</a></li>';
    }else{
      $url = explode(";",$key);
      if(count($url) > 1){
        echo '<li class="breadcrumb-item"><a href="'.url($url[1]).'" class="text-secondary">'.$url[0].'</a></li>';
      }else{
        echo '<li class="breadcrumb-item"><a href="#" class="text-secondary">'.$key.'</a></li>';
      }
    }
  }
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ url('img/logo/favicon.ico') }}">
    <title>YBM PLN SKM &mdash; @yield('title')</title>
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ url('vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet">
    <link href="{{ url('css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('vendor/izitoast/css/iziToast.min.css') }}">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

    @yield('css')
    <style>
        .btn-group-xs>.btn,
        .btn-xs {
            padding: .25rem .4rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }
        .text-navy{
            color:#001f3f!important;
        }

    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center bg-light"
                href="{{ url('index.html') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ url('img/logo/logo2.png') }}">
                </div>
                <div class="sidebar-brand-text mx-3"><span style="color: #296174; font-size:bolder;">YBM</span> <span
                        style="color: #00a2ba;">PLN</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ isActiveLink('home') }}">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Formulir
            </div>
            <li class="nav-item {{ isActiveLink('pendaftar') }}">
                <a class="nav-link" href="{{ url('/pendaftar') }}">
                    <i class="fab fa-fw fa-wpforms"></i>
                    <span>Formulir - SKM</span>
                </a>
            </li>
            <li class="nav-item {{ isActiveLink('survey') }}">
                <a class="nav-link" href="{{ url('/survey') }}">
                    <i class="fas fa-fw fa-tasks d-inline"></i>
                    <span>
                        Survey <small
                            class="badge badge-info text-xs float-right mt-1">{{ PendaftarController::totalSurvey() }}</small>
                    </span>
                </a>
            </li>
            <li class="nav-item {{ isActiveLink('approved') }}">
                <a class="nav-link" href="{{ url('/approved') }}">
                    <i class="fas fa-fw fa-check-square"></i>
                    <span>Approved</span>
                </a>
            </li>
            <li class="nav-item {{ isActiveLink('rejected') }}">
                <a class="nav-link" href="{{ url('/rejected') }}">
                    <i class="fas fa-fw fa-ban"></i>
                    <span>Rejected</span>
                </a>
            </li>
            <li class="nav-item {{ isActiveLink('pendaftars') }}">
                <a class="nav-link" href="{{ url('/pendaftars') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pendaftar Management</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Master
            </div>
            <li class="nav-item {{ isActiveLink('wilayah') }}">
                <a class="nav-link" href="{{ url('/wilayah') }}">
                    <i class="fas fa-fw fa-map-signs"></i>
                    <span>Data Wilayah</span>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('#') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="{{ url('#') }}" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ url('img/user.svg') }}"
                                    style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('#') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ url('#') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ url('#') }}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        <ol class="breadcrumb">
                            @php
                            $breadcrumb = app()->view->getSections()['breadcrumb'];
                            breadcrumb($breadcrumb);
                            @endphp
                        </ol>
                    </div>

                    @yield('isi')


                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Cancel</button>
                                    <a href="{{ route('logout') }}" class="btn btn-primary"
                                        onclick="event.preventDefault();   document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>YBM PLN SKM &mdash;
                            <script>
                                document.write(new Date().getFullYear());

                            </script> - Developed by
                            <b><a href="https://github.com/Nazyli/" target="_blank">Evry Nazyli</a></b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ url('vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ url('js/ruang-admin.min.js') }}"></script>
    <script src="{{ url('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ url('vendor/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ url('vendor/jquery-validation/localization/messages_id.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.scroller.min.js') }}"></script>
    <script src="{{ url('vendor/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ url('js/script.js') }}"></script>
    <script>
    @if(session('sukses'))
        iziToast.success({
            icon: 'far fa-check-circle',
            title: 'Sukses',
            message: "{{ session('sukses') }}",
            position: 'bottomRight'
        });
    @endif
    @if(session('error'))
        iziToast.error({
            icon: 'fa fa-exclamation-circle',
            title: 'Gagal',
            message: "{{ session('error') }}",
            position: 'bottomRight'
        });
    @endif
    </script>
    @yield('js')
    
</body>

</html>
