@extends('layouts.app')

@section('template_title')
    {{ $tablausuario->name ?? 'Show Tablausuario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tablausuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tablausuarios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idusuario:</strong>
                            {{ $tablausuario->idusuario }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $tablausuario->DNI }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $tablausuario->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $tablausuario->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Numcuenta:</strong>
                            {{ $tablausuario->numcuenta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
