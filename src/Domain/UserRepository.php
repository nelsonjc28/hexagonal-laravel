<?php


namespace Crud_users\Domain;


use \Crud_users\Domain\UserEntity;

interface UserRepository
{
    public function save(UserEntity $user);

}
