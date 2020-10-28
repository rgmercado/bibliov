@extends('belltheme.default')
@section('title','Mostrar Rol')
<!-- Custom styles for this template
<link href="{!! asset('css/narrow-jumbotron.css') !!}" rel="stylesheet"> -->
@section('content')
@include('common.success')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Rol de {{ $rol->descripcion}}</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col"><i class="fa fa-eye"></i> EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $rol->id }}</th>
                        <td>{{ $rol->name }}</td>
                        <td>{{ $rol->descripcion }}</td>
                        <td><a href="/roles/{{ $rol->id }}/edit" ><i class="fa fa-pencil-square-o"></i> Editar</a></td>

                        <td>{!! Form::open(['route'=> ['roles.destroy', $rol->id], 'method' => 'DELETE']) !!}
                            <button type="submit"  class="btn btn-danger" onclick ="return confirm('Seguro desea eliminar el Usuario?')"><i class="fa fa-trash-o"></i> Eliminar</button>
                        {!! Form::close() !!}</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
