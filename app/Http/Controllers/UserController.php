<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crud_users\Application\Services\CreateUserCommand;
use Crud_users\Infraestructure\Bus\Contracts\CommandBus;
use Crud_users\Infraestructure\Validations\ValidationUsers;

class UserController extends Controller
{
    public function store(Request $request){

        (new ValidationUsers())->run($request);
//        $command = new CreateUserCommand(
//            $request->name,
//            $request->email,
//            $request->Password,
//
//
//        );
//        dd($command);

    }
}
