<?php

namespace App\Http\Controllers;

use App\Contracts\ModelInterface;
use App\Http\Requests\ModelRequest;
use App\Http\Resources\ModelResource;
use App\Models\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ModelController extends Controller
{

    /**
     *  Get list of car models
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return ModelResource::collection(Model::paginate(10))->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Create new car model
     *
     * @param ModelRequest $modelRequest
     * @param ModelInterface $modelInterface
     *
     * @return JsonResponse
     */
    public function store(ModelRequest $modelRequest, ModelInterface $modelInterface) : JsonResponse
    {
        $createdModel = $modelInterface->store($modelRequest->only(['name', 'brand_id']));
        return ModelResource::make($createdModel)->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update car model name
     *
     * @param ModelRequest $modelRequest
     * @param Model $model
     *
     * @param ModelInterface $modelInterface
     *
     * @return JsonResponse
     */
    public function update(ModelRequest $modelRequest, Model $model, ModelInterface $modelInterface):JsonResponse
    {
        $modelInterface->update($model->id, $modelRequest->only(['name', 'brand_id']));
        return ModelResource::make([])->response()->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @param Model $model
     * @param ModelInterface $modelInterface
     *
     * @return JsonResponse
     */
    public function destroy(Model $model, ModelInterface $modelInterface): JsonResponse
    {
        $modelInterface->delete($model->id);
        return ModelResource::make([])->response()->setStatusCode(Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Model $model
     *
     * @return JsonResponse
     */
    public function show(Model $model): JsonResponse
    {
        return ModelResource::make($model)->response()->setStatusCode(Response::HTTP_OK);
    }
}
