<!-- Hero -->
<section class="hero">
    <!-- Encabezado -->
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <a class="hero-brand" href="#" title="Inicio"><img alt="Logo Unellez" src="/belltheme/img/logo.png"></a>
            </div>
        </div>
        <div class="col-md-12">
            <h1>
                Biblioteca Digital onLine Unellez
            </h1>
            <p class="tagline">
                Ya estan a disposición toda nuestra producción intelectual que puede revisar en línea.
            </p>
        </div>
    </div>
</section>
<!-- /Hero -->
<!-- Header -->
<header id="header">
    <div class="container">
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="{{ route('inicio') }}">Inicio</a></li>
                <li><a href="">Investigaciones</a></li>
                <li><a href="#portfolio">Revistas</a></li>
                <li><a href="#team">Equipo</a></li>
                <li><a href="#contact">Contactactenos</a></li>
            </ul>
        </nav>
        <!-- #nav-menu-container -->
        <nav class="nav social-nav pull-right d-none d-lg-inline">
            <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
        </nav>
        <form method="GET" action="{{ route('doc.busquedagral') }}">
            <nav class="nav social-nav pull-right ">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Buscar Ejemplar..." aria-label="Buscar" aria-describedby="basic-addon1" name="busquedaGral" required>
                </div>
            </nav>
        </form>

    </div>
</header>
<!-- #header -->
