<div id="right-panel" class="right-panel">
    <header id="header" class="header">

        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
					<a class="navbar-brand"><img   src="{{ asset('imagenes/facci.png') }}" alt="Logo"></a>
                
				
            </div>
			
            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bienvenido Gema Cevallos &nbsp;
                        <img class="user-avatar rounded-circle" src="{{ asset('imagenes/avatar.jpg') }}" alt="User Avatar">
                    </a>
                    <!--
                    <div class="user-menu dropdown-menu">
                            <a class="nav-link" ><i class="fa fa- user"></i>Perfil</a>

                            <a class="nav-link" ><i class="fa fa- user"></i>Notificaciones <span class="count">13</span></a>

                            <a class="nav-link" ><i class="fa fa -cog"></i>Configuracion</a>

                            <a class="nav-link" ><i class="fa fa-power -off"></i>Cerrar Sesion</a>
                    </div>
                    -->
                </div>

                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language" >
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header>

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>@yield('titulocab', 'Inicio')</h1>


                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">@yield('titulocab', 'Inicio')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        @yield('contenido')
    </div>
</div>