@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <thead>
                <th>Nombre</th>
                <th>Correo</th>
                <th>&nbsp;</th>
                </thead>
                <tbody>
                <tD>Nelson Castillo</tD>
                <th>nelsonjcastillos96@gmail.com</th>
                <th width="190px"><button class="btn btn-primary btn-sm">Ver</button>
                    <button class="btn btn-warning btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Borrar</button> </th>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
