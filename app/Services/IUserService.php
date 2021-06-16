<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

interface IUserService{

    public function getAllUsers(): Collection;

    public function getNotApprovedUser($args);

    public function findUserById($id);

    public function deleteUser($id);

}