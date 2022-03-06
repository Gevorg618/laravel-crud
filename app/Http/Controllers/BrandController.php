<?php

namespace App\Http\Controllers;

use App\Contracts\BrandInterface;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    /**
     *  Get list of car brands
     *
     *  @param Request $request
     *  @param BrandInterface $brandInterface
     *
     * @return JsonResponse
     */
    public function index(Request $request, BrandInterface $brandInterface) : JsonResponse
    {
        $name = null;
        if($request->has('name') && !is_null($request->input('name'))) {
            $name = $request->input('name');
        }

        $result = $brandInterface->index($name);

        return BrandResource::collection($result->paginate(10))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Create new car brand
     *
     * @param BrandRequest $brandRequest
     * @param BrandInterface $brandInterface
     *
     * @return JsonResponse
     */
    public function store(BrandRequest $brandRequest, BrandInterface $brandInterface) : JsonResponse
    {
        return BrandResource::make($brandInterface->store($brandRequest->only(['name'])))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update brand name
     *
     * @param BrandRequest $brandUpdateRequest
     * @param Brand $brand
     * @param BrandInterface $brandInterface
     *
     * @return JsonResponse
     */
    public function update(BrandRequest $brandUpdateRequest, Brand $brand, BrandInterface $brandInterface):JsonResponse
    {
        $brandInterface->update($brand->id, $brandUpdateRequest->only(['name']));
        return BrandResource::make([])->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @param Brand $brand
     * @return JsonResponse
     */
    public function show(Brand $brand): JsonResponse
    {
        return BrandResource::make($brand)->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Brand $brand
     * @param BrandInterface $brandInterface
     * @return JsonResponse
     */
    public function destroy(Brand $brand, BrandInterface $brandInterface): JsonResponse
    {
        $brandInterface->delete($brand->id);
        return BrandResource::make([])->response()->setStatusCode(Response::HTTP_NO_CONTENT);
    }

}
