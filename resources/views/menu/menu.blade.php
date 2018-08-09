<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand"><img src="{{ asset('imagenes/logo_grande.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden"><img src="{{ asset('imagenes/logo_grande.png') }}" alt="Logo"></a>
        </div>
        
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('inicio') }}"><i class="menu-icon fas fa-home"></i>Inicio </a>
                </li>

                

                <h3 class="menu-title">Simulaciones</h3>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fab fa-simplybuilt"></i>
                        Simulaciones
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fas fa-minus"></i> <a href="{{ url('linea-espera') }}">Linea de Espera</a></li>                        
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>