@extends('belltheme.default')
@section('title','Muestra Documento')
<!-- Custom styles for this template-->
<link href="{!! asset('css/narrow-jumbotron.css') !!}" rel="stylesheet">
@section('content')
@include('common.msgsuccess')
<div class="container">
    <div class="jumbotron">
        <img style="height: 200px; width: 180px; margin:20px;" src="{{ $uri->urlp }}" />
        <h3 class="display-6">{{ $ejemplar->tit1 }}</h3>
        <hr />
        <h3 class="display-6">Resumen Idioma Original</h3>
        <p class="text-justify">{{ $ejemplar->n_resume }}</p>
        <hr />
        <h3 class="display-6">Resumen Idioma Ingles</h3>
        <p class="text-justify">{{ $uri->resumenin }}</p>
    </div>

    <div class="row marketing">
        <div class="col-lg-4">
            <h4 class="font-weight-bold">Autor</h4>
            @php
                $autores = $ejemplar->authors()->first();
            @endphp
            <p>{{ $autores['index_author'] }}</p>

            <h4 class="font-weight-bold">Fecha</h4>
            <p>{{ $ejemplar->date_parution }}</p>

            <h4 class="font-weight-bold">ISDN</h4>
            <p>{{ $ejemplar->code }}</p>

            <h4 class="font-weight-bold">N Páginas</h4>
            <p>{{ $ejemplar->npages }}</p>

        </div>

        <div class="col-lg-4">
            <h4 class="font-weight-bold">Coleccion</h4>
            <p> {{ $ejemplar->collection['collection_name'] }} </p>

            <h4 class="font-weight-bold">Editorial</h4>
            <p>{{ $ejemplar->publisher['index_publisher'] }} </p>

            <h4 class="font-weight-bold">Volumen</h4>
            <p> {{ $ejemplar->tnvol }} </p>

            <h4 class="font-weight-bold">Desacargar pdf</h4>
            <a href="{{ $uri->urldoc }}">{{ $uri->urldoc }}</a>

        </div>

        @auth
        @if((Auth::user()->hasRole('admin')) and (Route::current()->getName() == 'doc.show'))
            <div class="col-lg-4" style="background-color:#bbb" ;>
                <h3 class="text-primary" style="padding:7px"><i class="fa fa-files-o"></i> Menu Documentos </h3>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown" style="padding-left: 15px;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-files-o"></i>
                            Crear/Actualizar<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('documenturl.create', ['req_form' => 'doc', 'isbn_doc' => $ejemplar->code, 'idnotice' => $ejemplar->notice_id])}}"><i class="fa fa-upload"></i>
                                {{ __('Subir Documentos') }}
                            </a>
                            @php
                                $code_sg = str_replace("-","",$ejemplar->code);
                            @endphp
                            <a class="dropdown-item" href="{{ route('documenturl.edit', ['isbn_doc' => $code_sg,'req_form' => 'doc', 'idnotice' => $ejemplar->notice_id]) }}"><i class="fa fa-pencil-square-o"></i>
                                {{ __('Actualizar Documentos') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('documenturl.edit', ['isbn_doc' => $code_sg,'req_form' => 'resumen', 'idnotice' => $ejemplar->notice_id]) }}"><i class="fa fa-pencil"></i></i>
                                {{ __('Actualizar Resuemenes') }}
                            </a>

                        </div>
                        <hr />
                        <!--Forma para eliminar registro con resumenes, portada y documento digital -->
                        {!! Form::open([ 'route' => ['documenturl.destroy',$code_sg], 'method' => 'DELETE']) !!}

                            {!! Form::hidden('idnotice', $ejemplar->notice_id) !!}

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
