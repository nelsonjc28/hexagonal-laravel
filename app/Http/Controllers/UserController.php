<?php

namespace App\Http\Controllers;

use App\User;
use Crud_users\Application\Services\UpdateUserCommand;
use Crud_users\Application\Services\UpdateUserHandler;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Crud_users\Application\Services\CreateUserCommand;
use Crud_users\Application\Services\EditUserCommand;
use Crud_users\Infraestructure\Bus\Contracts\CommandBus;
use Crud_users\Infraestructure\Validations\ValidationUsers;

class UserController extends Controller
{
    private $commandBus;
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;

    }

    public function listar()
    {

        $users = User::select(['id','name','email'])->get();

        return view('home',compact("users")) ;
    }

    public function store(Request $request)
    {
        (new ValidationUsers())->run($request);

        $command = new CreateUserCommand(null,$request->name, $request->email, $request->password);
        $vari = $this->commandBus->execute($command);
        return $vari;
    }

    public function show(Request $request)
    {
        $command = new EditUserCommand($request->id);
        $userFound = $this->commandBus->execute($command);
        return $userFound;
    }
    public function update(Request $request)
    {
        $command = new UpdateUserCommand($request->id, $request->name, $request->email, $request->password);
        $vari = $this->commandBus->execute($command);
        return $vari;
    }


}
