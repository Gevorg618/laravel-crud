<?php

namespace App\Repositories;

use App\Contracts\BrandInterface;
use App\Models\Brand;

class BrandRepository implements BrandInterface
{
    /**
     * @var Brand
     */
    protected Brand $model;

    /**
     * BrandRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Brand();
    }

    public function index(?string $name) : \Illuminate\Database\Eloquent\Builder
    {
        $query = $this->model->query()->with('models');

        if (!is_null($name)) {
            $query->where('name', 'like', '%'.$name.'%')
                ->orWhereHas('models',  function ($q) use ($name) {
                $q->where('name', 'like', '%'.$name.'%');
            });
        }

        return $query;
    }

    public function store(array $storeBrandData) : Brand
    {
        return $this->model->create($storeBrandData);
    }

    public function update(int $brandId, array $storeBrandData) : bool
    {
        return $this->model->find($brandId)->update($storeBrandData);
    }

    public function delete(int $brandId)
    {
        $this->model->find($brandId)->delete();
    }
}
