<?php

namespace App\Repository\Eloquent;

use App\Repository\IEloquentRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IEloquentRepository{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes): Model
    {
        return $this->model->where(['id' => $id])->update($attributes);
    }

    public function destroy($id): bool
    {
        return $this->model->destroy($id);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function with(...$with): Builder
    {
        return $this->model->with(...$with);
    }

    public function get()
    {
        return $this->model->get();
    }
}

