<?php


namespace Crud_users\Application\Services;

use Crud_users\Domain\UserEntity;
use Crud_users\Domain\UserRepository;

final class CreateUserHandler implements Hendler
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($command)
    {
        $user = new UserEntity(
            $command->getId(),
            $command->getName(),
            $command->getEmail(),
            $command->getPassword()
        );
        if(!$user->getId()){

            return $this->repository->save($user);

        }
        return $this->repository->update($user);
    }

}
