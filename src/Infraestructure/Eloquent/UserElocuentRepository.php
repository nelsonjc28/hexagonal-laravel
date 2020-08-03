<?php


namespace Crud_users\Infraestructure\Eloquent;

use App\User;
use Crud_users\Domain\UserEntity;
use Crud_users\Domain\UserRepository;

final class UserElocuentRepository implements UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function save(UserEntity $user)
    {
        $newUser = $this->model->create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt($user->getPassword())
        ]);
        return $newUser;
    }

    public function search(UserEntity $user)
    {
        $userFound = $this->model->find($user->getId());
        return $userFound;
    }

    public function update(UserEntity $user)
    {
        $userFound = $this->search($user);

        $userFound->name = $user->getName();
        $userFound->email = $user->getEmail();
        $userFound->password = bcrypt($user->getPassword());
        $userFound->save();

        return $userFound;
    }

}
