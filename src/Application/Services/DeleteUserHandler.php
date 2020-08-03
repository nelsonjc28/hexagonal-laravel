<?php


namespace Crud_users\Application\Services;

use Crud_users\Domain\UserEntity;
use Crud_users\Domain\UserRepository;

final class DeleteUserHandler implements Hendler
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
        return $this->repository->destroy($user);
    }

}
