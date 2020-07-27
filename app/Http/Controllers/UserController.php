<?php

namespace App\Http\Controllers;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Crud_users\Application\Services\CreateUserCommand;
use Crud_users\Infraestructure\Bus\Contracts\CommandBus;
use Crud_users\Infraestructure\Validations\ValidationUsers;

class UserController extends Controller
{
    private $commandBus;
    public function __construct(CommandBus $commandBus)
    {
        $this->CommandBus = $commandBus;

    }

    public function store(Request $request)
    {
        (new ValidationUsers())->run($request);
        $command = new CreateUserCommand($request->name, $request->email, $request->password);

        $this->commandBus->execute($command);
    }
}
