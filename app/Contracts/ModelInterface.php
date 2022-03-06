<?php

namespace App\Contracts;

use App\Models\Model;

interface ModelInterface
{
    /**
     * store car model.
     *
     * @param array $storeModelData
     * @return Model
     */
    public function store(array $storeModelData) : Model;

    /**
     * update car model.
     *
     * @param int $modelId
     * @param array $storeModelData
     * @return bool
     */
    public function update(int $modelId, array $storeModelData) : bool;

    /**
     * remove car model.
     *
     * @param int $modelId
     *
     * @return bool
     */
    public function delete(int $modelId);
}
