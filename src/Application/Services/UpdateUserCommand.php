<?php

namespace Crud_users\Application\Services;

use Crud_users\Application\Contracts\Command;

class UpdateUserCommand implements Command
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id = null,$name, $email, $password)
    {

        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

}
