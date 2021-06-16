<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface IUserRepository{
    public function allUsers(): Collection;

    public function getNotApprovedUser($args);

    public function findUserById($id);

    public function deleteUser($id);
}