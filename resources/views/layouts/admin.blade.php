<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi Sistema de Pilotos2</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

    <!-- Incrustación -->
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="{{asset('template/dataTables-export/datatables_custom/main.css')}}">  
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="{{asset('template/dataTables-export/datatables_custom/datatables/datatables.min.css')}}">
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="{{asset('template/dataTables-export/datatables_custom/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css')}}">
    <!-- Fin Incrustación -->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Pi</b>@</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Pilotos2</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Sistema</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                   @can('marcas_listar')
                   <li><a href="{{URL::action('App\Http\Controllers\MarcaControlador@index')}}"><i class="fa fa-male"></i> Marca</a></li>
                   @endcan
                   @can('modelos_listar')
                    <li><a href="{{URL::action('App\Http\Controllers\ModeloControlador@index')}}"><i class="fa fa-male"></i> Modelo</a></li>
                   @endcan
                   @can('marcas_grafica')
                    <li><a href="{{URL::action('App\Http\Controllers\ModeloControlador@grafico')}}"><i class="fa fa-male"></i> Grafico</a></li>
                   @endcan
              </ul>
            </li>
              
            @role('Administrador')                   
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario"><i class="fa fa-users"></i> Usuarios</a></li>
              </ul>
            </li>
            @endrole
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Pilotos2</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2021
        </div>
        <strong>Copyright &copy; 2021 <a href="#">Jessica Florez</a>.</strong> All rights reserved.
      </footer>
      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- <script src="{{asset('js/bootstrap-select.min.js')}}"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
    <!-- Incrustracion -->
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <!-- <script src="{{asset('template/dataTables-export/datatables_custom/jquery/jquery-3.3.1.min.js')}}"></script> -->   
    <script src="{{asset('template/dataTables-export/datatables_custom/popper/popper.min.js')}}"></script>
    <!-- <script src="{{asset('template/dataTables-export/datatables_custom/bootstrap/js/bootstrap.min.js')}}"></script> -->
      
    <!-- datatables JS -->
    <script type="text/javascript" src="{{asset('template/dataTables-export/datatables_custom/datatables/datatables.min.js')}}"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>  
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>    
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>    
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
    <script src="{{asset('template/dataTables-export/datatables_custom/datatables/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="{{asset('template/dataTables-export/datatables_custom/main.js')}}"></script>
    <!-- Fin Incrustracion -->
  </body>
</html>
