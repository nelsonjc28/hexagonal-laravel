<?php


namespace Crud_users\Domain;


use phpDocumentor\Reflection\Types\String_;

final class UserEntity
{

    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct(?int $id = null, string $name = null, string $email = null, string $password = null )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): ?int
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
