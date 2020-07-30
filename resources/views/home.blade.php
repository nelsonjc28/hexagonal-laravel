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

                <table class="table table-bordered table-striped" id="tableUser">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr id="{{$user->id}}">
                            <th class="username">{{$user->name}}</th>
                            <th class="email">{{$user->email}}</th>
                            <th width="190px">
                                <button class="btn btn-primary btn-sm" onclick="ver({{$user->id}})">Ver</button>
                                <button class="btn btn-warning btn-sm" onclick="editar({{$user->id}})">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="borrar({{$user->id}})">Borrar</button>
                            </th>
                        </tr>
                    @endforeach
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
                            <input name="password" id="password" type="password" class="form-control" minlength="8"
                                   required>
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
    <div class="modal fade" id="userModalEdit" tabindex="-1" role="dialog" aria-labelledby="titleLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="userEditForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleLabel">Editar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group-group">
                            <label for="name">Nombre</label>
                            <input name="name" id="editName" type="text" class="form-control" required>
                        </div>

                        <div class="input-group-group">
                            <label for="email">Email</label>
                            <input name="email" id="editEmail" type="email" class="form-control" required>
                        </div>
                        <div class="input-group-group">
                            <label for="password">Clave</label>
                            <input name="password" id="editPassword" type="password" class="form-control" minlength="8"
                                   required>
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
            }

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: window.location.origin + '/user/create',
                data: form,
                dataType: 'json',
                success: function (data) {

                    $("#tableUser").append(
                        '<tr id="' + data.id + '">' +
                        '<th class="username">' + data.name + '</th>' +
                        '<th class="email">' + data.email + '</th>' +
                        '<th width="190px">' +
                        '<button class="btn btn-primary btn-sm" onclick="ver(' + data.id + ')">Ver</button>' +
                        '<button class="btn btn-warning btn-sm" onclick="editar(' + data.id + ')">Editar</button>' +
                        '<button class="btn btn-danger btn-sm" onclick="borrar(' + data.id + ')">Borrar</button>' +
                        '</th>' +
                        '</tr>');

                },
                error: function (error) {
                },
            });

        })

        $('body #userModal').on('hidden.bs.modal', function (e) {
            $('#userModal #userForm #name').val('');
            $('#userModal #userForm #email').val('');
            $('#userModal #userForm #password').val('');
        })

        var ver = function (id) {
            console.log(id)
        }

        var editar = function (id) {
            $.get({
                url:window.location.origin + '/user/show/'+id,
                success:function (data) {
                    console.log(data)
                    $('#userModalEdit').modal('show');

                }
            })
        }

        var borrar = function (id) {
            console.log(id)
        }

    </script>
@endsection

