<?php

namespace App\Contracts;

use App\Models\Brand;
use Illuminate\Database\Query\Builder;

interface BrandInterface
{

    /**
     * store brand.
     *
     * @param ?string $name
     * @return Builder
     */
    public function index(?string $name) : \Illuminate\Database\Eloquent\Builder;

    /**
     * store brand.
     *
     * @param array $storeBrandData
     * @return Brand
     */
    public function store(array $storeBrandData) : Brand;


    /**
     * update brand.
     *
     * @param int $brandId
     * @param array $updateBrandData
     *
     * @return bool
     */
    public function update(int $brandId, array $updateBrandData) : bool;

    /**
     * remove brand.
     *
     * @param int $brandId
     *
     * @return bool
     */
    public function delete(int $brandId);

}
