<?php


namespace Crud_users\Domain;


use \Crud_users\Domain\UserEntity;

interface UserRepository
{
    public function save(UserEntity $user);

    public function search(UserEntity $user);

    public function update(UserEntity $user);

    public function destroy(UserEntity $user);

}
