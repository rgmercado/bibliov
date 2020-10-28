@extends('belltheme.default')
@section('title','Listado Usuarios del Sistema')
<!-- Custom styles for this template
<link href="{!! asset('css/narrow-jumbotron.css') !!}" rel="stylesheet"> -->
@section('content')
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Listado Usuarios del Sistema</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">DESCRIPCION</th>
                        <th scope="col">ROLE(S)</th>
                        <th scope="col"><i class="fa fa-eye"></i>  EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Lectura de los Datos-->
                    @php
                        $rol_add = '';
                    @endphp
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email}}</td>
                        @foreach ($user->roles()->get() as $rol)
                            @php
                            $rol_add = $rol->name.'|'.$rol_add;
                            @endphp
                        @endforeach
                        <td>{{ $rol_add }}</td>

                        <td><a href="/edit/{{ $user->id }}/edit" ><i class="fa fa-pencil-square-o"></i> Editar</a></td>

                        <td>{!! Form::open(['route'=> ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                            <button type="submit"  onclick ="return confirm('Seguro desea eliminar el Usuario?')" class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                        {!! Form::close() !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
