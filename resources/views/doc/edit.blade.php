@extends('belltheme.default')
@section('title','Subir Documentos y Resumen digitales')
@section('content')
@include('common.inputFile')
@auth
@if(Auth::user()->hasRole('admin'))
@if ($formRequest == "doc")
    <!-- Forma para subir portada y documento digital-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Subir Documentos y Resumen digitales') }}</h2></div>
                    <div class="card-body">
                        <form class="form-group" method="POST" action="{{ route('documenturl.update', $urlmodel->cota_doc) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="isbn" name="isbn" value="{{ $urlmodel->cota_doc }}">
                            <input type="hidden" id="req_form" name="req_form" value="{{ $formRequest }}">
                            <input type="hidden" id="idnotice" name="idnotice" value="{{ $idnotice }}">
                            <!-- Campos de entrada forma subir archivos-->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="portada" name="portada" value="{{ $urlmodel->urlp }}" autofocus >
                                        <label class="custom-file-label" for="portada">{{ $urlmodel->urlp }}</label>
                                    </div>
                                    @if ($errors->has('portada'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('portada') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ejemplar" name="ejemplar" value="{{ $urlmodel->urldoc }}" autofocus />
                                        <label class="custom-file-label" for="portada">{{ $urlmodel->urldoc }}</label>
                                    </div>
                                    @if ($errors->has('ejemplar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ejemplar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class"btn btn-bg-primary"><i class="fa fa-cloud-upload"></i>  Subir...</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($formRequest == "resumen")
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h2>{{ __('Resumen Ejemplar en 2 Idiomas') }}</h2></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('documenturl.update', $urlmodel->cota_doc)  }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="isbn" name="isbn" value="{{ $urlmodel->cota_doc }}">
                                <input type="hidden" id="req_form" name="req_form" value="{{ $formRequest }}">
                                <input type="hidden" id="idnotice" name="idnotice" value="{{ $idnotice }}">

                                <div class="form-group row">
                                    <label for="resumenO" class="col-md-4 col-form-label text-md-right">{{ __('Resumen Idioma Original') }}</label>

                                    <div class="col-md-8">

                                        <textarea name="resumenO" rows="10" cols="45" id="resumenO" type="text" class="form-control{{ $errors->has('resumenO') ? ' is-invalid' : '' }}" name="resumenO" value="{{ $urlmodel->resumenes }}" required autofocus>{{ $urlmodel->resumenes }}</textarea />

                                        @if ($errors->has('resumenO'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('resumenO') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="resumenI" class="col-md-4 col-form-label text-md-right">{{ __('Resumen Idioma Ingles') }}</label>

                                    <div class="col-md-8">
                                        <textarea name="resumenI" rows="10" cols="45" id="resumenI" type="text" class="form-control{{ $errors->has('resumenI') ? ' is-invalid' : '' }}" name="resumenI" value="{{ $urlmodel->resumenin }}" required autofocus> {{ $urlmodel->resumenin }}</textarea>
                                        <br>

                                        @if ($errors->has('resumenI'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('resumenI') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Enviar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@endauth
@endsection
