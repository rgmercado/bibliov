@extends('belltheme.default')
@section('title','Lista de Ejemplares')
<!-- Custom styles for this template
<link href="{!! asset('css/narrow-jumbotron.css') !!}" rel="stylesheet"> -->
@section('content')
@include('common.msgsuccess')
<?php $i = 1; ?>
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Lista de Ejemplares</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">COTA</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">AUTOR</th>
                        <th scope="col">COLECCION</th>
                        <th scope="col"><i class="fa fa-eye"></i>  EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Lectura de los Datos-->
                    @foreach ($ejemplares as $ejemplar)

                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $ejemplar->cota }}</td>
                        <td>{{ $ejemplar->titulo }}</td>
                        <td>{{ $ejemplar->autor }}</td>
                        <td> {{ $ejemplar->coleccion }}</td>
                        <td><a href="/document/{{ $ejemplar->cota }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Ir..</a> </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
