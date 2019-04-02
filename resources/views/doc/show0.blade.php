@extends('belltheme.default')
@section('title','Muestra Documento')
<!-- Custom styles for this template-->
<link href="{!! asset('css/narrow-jumbotron.css') !!}" rel="stylesheet">
@section('content')
@include('common.msgsuccess')
<div class="container">
    <div class="jumbotron">
        <img style="height: 200px; width: 180px; margin:20px;" src="{{ $uri->urlp }}" />
        <h3 class="display-6">{{ $doc[0]->titulo }}</h3>
        <hr />
        <h3 class="display-6">Resumen Idioma Original</h3>
        <p class="text-justify">{{ $uri->resumenes }}</p>
        <hr />
        <h3 class="display-6">Resumen Idioma Ingles</h3>
        <p class="text-justify">{{ $uri->resumenin }}</p>
    </div>

    <div class="row marketing">
        <div class="col-lg-4">
            <h4 class="font-weight-bold">Autor</h4>
            <p>{{ $doc[0]->autor }}</p>

            <h4 class="font-weight-bold">Fecha</h4>
            <p>{{ $doc[0]->fecha_pub }}</p>

            <h4 class="font-weight-bold">ISDN</h4>
            <p>{{ $doc[0]->isbn }}</p>
        </div>

        <div class="col-lg-4">
            <h4 class="font-weight-bold">Coleccion</h4>
            <p> {{ $doc[0]->coleccion }} </p>

            <h4 class="font-weight-bold">Editorial</h4>
            <p>{{ $doc[0]->editorial }}.</p>

            <h4 class="font-weight-bold">Desacargar pdf</h4>
            <a href="{{ $uri->urldoc }}">{{ $uri->urldoc }}</a>
        </div>

        @auth
        @if((Auth::user()->hasRole('admin')) and (Route::current()->getName() == 'document.show'))
            <div class="col-lg-4" style="background-color:#bbb" ;>
                <h3 class="text-primary" style="padding:7px"><i class="fa fa-files-o"></i> Menu Documentos </h3>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown" style="padding-left: 15px;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-files-o"></i>
                            Crear/Actualizar<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('documenturl.create', ['req_form' => 'doc', 'isbn_doc' => $doc[0]->cota])}}"><i class="fa fa-upload"></i>
                                {{ __('Subir Documentos') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('documenturl.edit', ['isbn_doc' => $doc[0]->cota,'req_form' => 'doc']) }}"><i class="fa fa-pencil-square-o"></i>
                                {{ __('Actualizar Documentos') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('documenturl.edit', ['isbn_doc' => $doc[0]->cota,'req_form' => 'resumen']) }}"><i class="fa fa-pencil"></i></i>
                                {{ __('Actualizar Resuemenes') }}
                            </a>

                        </div>
                        <hr />
                        <!--Forma para eliminar registro con resumenes, portada y documento digital -->
                        {!! Form::open([ 'route' => ['documenturl.destroy', $doc[0]->cota], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Eliminar Documentos', ['class'=>'dropdown-item', 'onclick' => "return confirm('Seguro desea eliminar Documentos?')"]) !!}
                        {!! Form::close() !!}

                        <hr />

                    </li>
                </ul>
            </div>
            @endif
            @endauth

    </div>
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
        ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{!! asset('js/ie10-viewport-bug-workaround.js') !!}"></script>
@endsection
