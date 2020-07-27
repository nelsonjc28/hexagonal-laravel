<?php

namespace Crud_users\Infraestructure\Validations;

use Illuminate\Http\Request;


class ValidationUsers
{

    public function run(Request $request)
    {
        $request->validate([
            'name'=>'required|String|Max:50',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            ]);

    }

}
