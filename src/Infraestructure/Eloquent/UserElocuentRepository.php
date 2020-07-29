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
}
