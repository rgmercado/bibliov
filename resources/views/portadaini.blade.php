@extends('belltheme.default')
@section('title','Inicio Biblioteca Virtual Unellez')
@section('content')
@include('common.success')
<section class="about" id="about">
    <div class="container text-center">
        <h2> Nuestra producción intelectual </h2>
        <p>
            Hemoas comocado a disposición de investigadores y publico en general toda la producción intelectual de nuestra casa de estudio. tendra la posibilidad de leerla en linea o descargarla segun lo permita la licencia del documento.
        </p>
        <div class="row stats-row">
            <div class="stats-col text-center col-md-3 col-sm-6">
                <div class="circle">
                    <span class="stats-no" data-toggle="counter-up">232</span> Investigaciones
                </div>
            </div>
            <div class="stats-col text-center col-md-3 col-sm-6">
                <div class="circle">
                    <span class="stats-no" data-toggle="counter-up">79</span> Tesis de Pregrado
                </div>
            </div>
            <div class="stats-col text-center col-md-3 col-sm-6">
                <div class="circle">
                    <span class="stats-no" data-toggle="counter-up">1,463</span> Trabajos de Grado Posgrado
                </div>
            </div>
            <div class="stats-col text-center col-md-3 col-sm-6">
                <div class="circle">
                    <span class="stats-no" data-toggle="counter-up">15</span> Revistas
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
