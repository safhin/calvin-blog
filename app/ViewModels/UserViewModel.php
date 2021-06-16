<?php

namespace App\ViewModels;

use App\Services\IUserService;
use Illuminate\Database\Eloquent\Collection;

class UserViewModel{

    private $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAllUsers(): Collection
    {
        return $this->userService->getAllUsers();
    }
    public function getNotApprovedUser($args)
    {
        return $this->userService->getNotApprovedUser($args);
    }

    public function findUserById($id)
    {
        return $this->userService->findUserById($id);
    }

    public function deleteUser($id)
    {
        return $this->userService->deleteUser($id);
    }
}