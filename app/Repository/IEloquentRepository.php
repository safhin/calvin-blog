<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface IEloquentRepository{

    public function create(array $attributes): Model;

    public function update($id, $attributes): Model;

    public function destroy($id) : bool;

    public function find($id) : ?Model;

    public function with(...$with): Builder;

    public function get();
}