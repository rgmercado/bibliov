@extends('belltheme.default')
@section('title','Lista de Ejemplares')
<!-- Custom styles for this template
<link href="{!! asset('css/narrow-jumbotron.css') !!}" rel="stylesheet"> -->
@section('content')
@php
    $i = 1;
@endphp

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Ejemplares por Fecha de Publicación</h1>
        <div class="table-responsive">
                {{ $ejemplares-> links ( ) }}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">COTA</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">AUTOR</th>
                        <th scope="col">COLECCION</th>
                        <th scope="col">FECHA PUB.</th>
                        <th scope="col"><i class="fa fa-eye"></i>  EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Lectura de los Datos-->

                    @foreach ($ejemplares as $ejemplar)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $ejemplar->code }}</td>
                            <td>{{ $ejemplar->tit1 }}</td>
                            @php
                                $autores = $ejemplar->authors()->first();
                            @endphp
                            <td>{{ $autores['index_author'] }}</td>
                            <td> {{ $ejemplar->collection['collection_name'] }}</td>
                            <td> {{ $ejemplar->date_parution }}</td>
                            <td><a href="{{ route('doc.show', $ejemplar->notice_id) }} " class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Ir..</a> </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>

            </table>
            {{ $ejemplares-> links ( ) }}

        </div>
    </div>
</div>
@endsection
