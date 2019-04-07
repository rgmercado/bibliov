@extends('belltheme.default')
@section('title','Equipo')
@section('content')
<div class="row">
    @for ($i = 1; $i < 4; $i++)
        <div class="col-sm">
            <div class="card text-center" styele="width:18rem; margin-top: 70px;">
                <img style="height:100px; width:100px; background-color:#EFEFEF; margin:20px;" class="card-img-top rounded-circle mx-auto d-block" src="/belltheme/img/user.png" />
                <div class="card-body">
                    <h5 class="card-title"> Raul G Mercado</h5>
                    <p class="card-text lead">
                        Coordinador de Automatizacion Biblioteca Central de la Unniversidad experimenta.
                    </p>

                </div>
            </div>
        </div>
    @endfor
</div>
@endsection
