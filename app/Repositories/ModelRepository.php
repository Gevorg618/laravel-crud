<?php

namespace App\Repositories;

use App\Contracts\ModelInterface;
use App\Models\Model;

class ModelRepository implements ModelInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * ModelRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Model();
    }

    public function store(array $storeBrandData) : Model
    {
        return $this->model->create($storeBrandData);
    }

    public function update(int $modelId, array $updateModelData) : bool
    {
        return $this->model->find($modelId)->update($updateModelData);
    }

    public function delete(int $modelId)
    {
        $this->model->find($modelId)->delete();
    }
}
