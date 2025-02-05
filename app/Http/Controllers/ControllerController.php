<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetBuatMilestoneRequest;
use App\Http\Requests\GetInviteRequestRequest;
use App\Http\Requests\InsertBuatMilestoneRequest;
use App\Http\Requests\UpdateInviteRequestRequest;
use App\Http\Services\Controller\GetBuatMilestoneService;
use App\Http\Services\Controller\GetInviteRequestService;
use App\Http\Services\Controller\InsertBuatMilestoneService;
use App\Http\Services\Controller\UpdateInviteRequestService;
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

    /**
     * @param GetInviteRequestService $service
     * @param GetInviteRequestRequest $request
     * @return JsonResponse
     */
    public function getInviteRequest(GetInviteRequestService $service, GetInviteRequestRequest $request): JsonResponse
    {
        return $service->handle($request);
    }

    /**
     * @param UpdateInviteRequestService $service
     * @param UpdateInviteRequestRequest $request
     * @return JsonResponse
     */
    public function updateInviteRequest(UpdateInviteRequestService $service, UpdateInviteRequestRequest $request): JsonResponse
    {
        return $service->handle($request);
    }
}
