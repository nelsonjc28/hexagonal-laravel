@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#userModal">
                    Crear
                </button>
            </div>
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
                    <th width="190px">
                        <button class="btn btn-primary btn-sm">Ver</button>
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Borrar</button>
                    </th>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="titleLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="userForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleLabel">Crear usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group-group">
                            <label for="name">Nombre</label>
                            <input name="name" id="name" type="text" class="form-control" required>
                        </div>

                        <div class="input-group-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" class="form-control" required>
                        </div>
                        <div class="input-group-group">
                            <label for="password">Clave</label>
                            <input name="password" id="password" type="password" class="form-control" minlength="8" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('script')
    <script type="application/javascript">

        $('#userModal #userForm').on('submit', function (e) {
            e.preventDefault();

            let form = $('#userModal #userForm').serialize();

            $('#userModal').modal('hide');

            if ($('.modal-backdrop').is(':visible')) {
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            };

            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: "POST",
                url: window.location.origin+'/user/create',
                data: form,
                dataType: 'json',
                success : function(data) {
                },
                error : function(error) {
                },
            });

        })

        $('body #userModal').on('hidden.bs.modal', function (e) {
            $('#userModal #userForm #name').val('');
            $('#userModal #userForm #email').val('');
            $('#userModal #userForm #password').val('');
        })

    </script>
@endsection

