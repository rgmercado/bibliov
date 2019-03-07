<!--Bloque para la Autenticacion -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Sidebar -->
<div class="left" style="background-color:#bbb;">
    <ul>
        @include('common.usuariologin')
    </ul>
    <hr />

    <!--Menu para la busqueda de documentos -->
    <h3 class="text-primary" style="padding:7px">Busque por: <i class="fa fa-search"></i></h3>
    <ul id="myMenu">
        <li><a href="#"><i class="fa fa-tripadvisor"></i> Titulos </a></li>
        <li><a href="#"><i class="fa fa-calendar"></i> Fecha de Publicacion</a></li>
        <li><a href="#"><i class="fa fa-address-card"></i> Autores</a></li>
        <li><a href="#"><i class="fa fa-file-o"></i> Materia</a></li>
        <li><a href="#"><i class="fa fa-files-o"></i> Coleccion</a></li>
        <hr />
    </ul>
    @auth
    @if(Auth::user()->hasRole('admin'))
        <h3 class="text-primary" style="padding:7px"><i class="fa fa-home"></i> Menu Admin </h3>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown" style="padding-left: 15px;">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-users"></i>
                    Usuarios <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fa fa-tasks"></i>
                        {{ __('Listar') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('register') }}"><i class="fa fa-registered"></i>
                        {{ __('Registrar') }}
                    </a>

                </div>
            </li>
            <li class="nav-item dropdown" style="padding-left: 15px;">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-address-card"></i>
                    Roles <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fa fa-tasks"></i>
                        {{ __('Listar') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('roles.create') }}"><i class="fa fa-registered"></i>
                        {{ __('Registrar') }}
                    </a>

                </div>
            </li>

        </ul>
        <hr />
    @endif
    @endauth
</div>
