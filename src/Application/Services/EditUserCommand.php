<?php

namespace Crud_users\Application\Services;

use Crud_users\Application\Contracts\Command;

class EditUserCommand implements Command
{

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}
