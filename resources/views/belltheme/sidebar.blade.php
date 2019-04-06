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
        <li><i class="fa fa-tripadvisor"></i> Titulo
            <form method="GET" action="{{ route('doc.busquedagral') }}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                    </div>
                        <input type="text" class="form-control" placeholder="Ejemplar..." aria-label="Buscar" aria-describedby="basic-addon1" name="busquedaGral" required>
                    </div>
            </form>
        </li>
        <li><i class="fa fa-calendar"></i> Fecha de Publicación</li>
        <form method="GET" action="{{ route('doc.busquedafe') }}">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                </div>
                    <input type="text" class="form-control" placeholder="2007, >=2006, < 2009." aria-label="Buscar" aria-describedby="basic-addon1" name="busquedaGral" required>
                </div>
        </form>
        <li><a href="#"><i class="fa fa-address-card"></i> Autores</a>
            <form method="GET" action="{{ route('doc.busquedauth') }}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                    </div>
                        <input type="text" class="form-control" placeholder="Autor(es)..." aria-label="Buscar" aria-describedby="basic-addon1" name="busquedaGral" required>
                    </div>
            </form>
        </li>

        <li><i class="fa fa-file-o"></i> Categoría
            <form method="GET" action="{{ route('doc.busquedacat') }}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                    </div>
                        <input type="text" class="form-control" placeholder="Categoría..." aria-label="Buscar" aria-describedby="basic-addon1" name="busquedaGral" required>
                    </div>
            </form>
        </li>

        <li><i class="fa fa-files-o"></i> Colección
            <form method="GET" action="{{ route('doc.busquedacoll') }}">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                    </div>
                        <input type="text" class="form-control" placeholder="Colección..." aria-label="Buscar" aria-describedby="basic-addon1" name="busquedaGral" required>
                    </div>
            </form>
        </li>
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
            <li class="nav-item dropdown" style="padding-left: 15px;">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-address-card"></i>
                    Setting <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('roles.index') }}"><i class="fa fa-tasks"></i>
                        {{ __('Contactos') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('roles.create') }}"><i class="fa fa-registered"></i>
                        {{ __('Equipo') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('roles.create') }}"><i class="fa fa-registered"></i>
                        {{ __('Redes Sociales') }}
                    </a>

                </div>
            </li>

        </ul>
        <hr />
    @endif
    @endauth
</div>
