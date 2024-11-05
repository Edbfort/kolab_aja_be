<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetBuatMilestoneRequest;
use App\Http\Requests\InsertBuatMilestoneRequest;
use App\Http\Services\Controller\GetBuatMilestoneService;
use App\Http\Services\Controller\InsertBuatMilestoneService;
use Illuminate\Http\JsonResponse;

class ControllerController extends Controller
{
    /**
     * @param GetBuatMilestoneRequest $request
     * @param GetBuatMilestoneService $service
     * @return JsonResponse
     */
    public function getBuatMilestone(GetBuatMilestoneRequest $request, GetBuatMilestoneService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param InsertBuatMilestoneRequest $request
     * @param InsertBuatMilestoneService $service
     * @return JsonResponse
     */
    public function insertBuatMilestone(InsertBuatMilestoneRequest $request, InsertBuatMilestoneService $service)
    {
        return $service->handle($request);
    }
}
