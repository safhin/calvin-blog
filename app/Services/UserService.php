<?php

namespace App\Services;

use App\Repository\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService implements IUserService{

    private $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(): Collection
    {
        return $this->userRepository->allUsers();
    }
    public function getNotApprovedUser($args)
    {
        return $this->userRepository->getNotApprovedUser($args);
    }

    public function findUserById($id)
    {
        return $this->userRepository->findUserById($id);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}