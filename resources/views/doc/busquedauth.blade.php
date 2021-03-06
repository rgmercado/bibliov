@extends('belltheme.default')
@section('title','Lista de Ejemplares')
<!-- Custom styles for this template
<link href="{!! asset('css/narrow-jumbotron.css') !!}" rel="stylesheet"> -->
@section('content')
<div class="container">
    <div class="jumbotron">
        <h2 class="display-4">Ejemplares Autor</h2>
        <div class="table-responsive">
            {{ $authors-> links ( ) }}
            @foreach ($authors as $author)
                <tr><h3>{{ $author->author_name}}, {{ $author->author_rejete }}</h3></tr>
                @php
                    $ejemplares = $author->notices;
                    $i = 1;
                @endphp
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">COTA</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">COLECCION</th>
                        <th scope="col"><i class="fa fa-eye"></i>  EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Lectura de los Datos-->

                    @foreach ($ejemplares as $ejemplar)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $ejemplar['code'] }}</td>
                            <td>{{ $ejemplar['tit1'] }}</td>
                            <td> {{ $ejemplar->collection['collection_name'] }}</td>
                            <td><a href="{{ route('doc.show', $ejemplar->notice_id) }} " class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Ir..</a> </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @endforeach
                </tbody>

            </table>
                {{ $authors-> links ( ) }}

        </div>
    </div>
</div>
@endsection
