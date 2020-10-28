@extends('belltheme.default')
@section('title','Subir Documentos y Resumen digitales')
@section('content')
@include('common.inputFile')
@auth
@if(Auth::user()->hasRole('admin'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('Subir Documentos y Resumen digitales') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('documenturl.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="isbn" name="isbn" value="{{ $isbn }}">
                            <input type="hidden" id="req_form" name="req_form" value="{{ $formRequest }}">
                            <input type="hidden" id="idnotice" name="idnotice" value="{{ $idnotice }}">
                            <!-- Campos de entrada forma subir archivos-->
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="portada" name="portada" value="{{ old('portada') }}" autofocus >
                                        <label class="custom-file-label" for="portada">Seleccione imagen</label>
                                    </div>
                                    @if ($errors->has('portada'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('portada') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ejemplar" name="ejemplar" value="{{ old('ejemplar') }}" autofocus />
                                        <label class="custom-file-label" for="portada">Seleccione pdf</label>
                                    </div>
                                    @if ($errors->has('ejemplar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ejemplar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- -->

                            <div class="form-group row">
                                <label for="resumenO" class="col-md-4 col-form-label text-md-right">{{ __('Resumen Idioma Original') }}</label>

                                <div class="col-md-8">

                                    <textarea name="resumenO" rows="10" cols="45" id="resumenO" type="text" class="form-control{{ $errors->has('resumenO') ? ' is-invalid' : '' }}" name="resumenO" value="{{ old('resumenO') }}" required autofocus> Coloque  aqui el resumen en el idioma Original</textarea />

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
                                    <textarea name="resumenI" rows="10" cols="45" id="resumenI" type="text" class="form-control{{ $errors->has('resumenI') ? ' is-invalid' : '' }}" name="resumenI" value="{{ old('resumenI') }}" required autofocus> Coloque  aqui el resumen en Ingles</textarea>
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
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload"></i>
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
    @endauth
    @endsection
