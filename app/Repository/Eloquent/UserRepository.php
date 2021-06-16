<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements IUserRepository{

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function allUsers(): Collection
    {
        return $this->user->all();
    }

    public function getNotApprovedUser($args)
    {
        return $this->user->whereNull('approved_at')->get();
    }

    public function findUserById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function deleteUser($id)
    {
        return $this->user->destroy($id);
    }
}