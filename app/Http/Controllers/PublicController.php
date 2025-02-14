<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateBillingRekeningRequest;
use App\Http\Requests\GetBillingRekeningRequest;
use App\Http\Requests\GetDesignBriefRequest;
use App\Http\Requests\GetDetailProyekRequest;
use App\Http\Requests\GetMemberRequest;
use App\Http\Requests\GetMilestoneRequest;
use App\Http\Requests\GetProyekListRequest;
use App\Http\Requests\GetTeamRequest;
use App\Http\Requests\InsertAnggotaKeProyekRequest;
use App\Http\Requests\InsertChangePasswordRequest;
use App\Http\Requests\UpdateAcceptDesignBriefRequest;
use App\Http\Requests\UpdateAcceptMilestoneRequest;
use App\Http\Requests\UpdateDesignBriefRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateSelesaiMilestoneRequest;
use App\Http\Requests\UpdateTerbayarMilestoneRequest;
use App\Http\Services\Controller\InsertChangePasswordService;
use App\Http\Services\Controller\UpdateDesignBriefService;
use App\Http\Services\CreativeHubTeam\GetMemberService;
use App\Http\Services\Public\CreateOrUpdateBillingRekeningService;
use App\Http\Services\Public\GetBillingRekeningService;
use App\Http\Services\Public\GetDesignBriefService;
use App\Http\Services\Public\GetDetailProyekService;
use App\Http\Services\Public\GetMilestoneService;
use App\Http\Services\Public\GetProfileService;
use App\Http\Services\Public\GetProyekListService;
use App\Http\Services\Public\GetSpesialisasiService;
use App\Http\Services\Public\GetTeamService;
use App\Http\Services\Public\InsertAnggotaKeProyekService;
use App\Http\Services\Public\UpdateAcceptDesignBriefService;
use App\Http\Services\Public\UpdateAcceptMilestoneService;
use App\Http\Services\Public\UpdateProfileService;
use App\Http\Services\Public\UpdateSelesaiMilestoneService;
use App\Http\Services\Public\UpdateTerbayarMilestoneService;
use Illuminate\Http\JsonResponse;

class PublicController extends Controller
{
    /**
     * Handle incoming request
     *
     * @param GetProfileService $service
     */
    public function getProfile(GetProfileService $service, $id)
    {
        return $service->handle($id);
    }

    /**
     * Handle incoming request
     *
     * @param UpdateProfileService $service
     * @param UpdateProfileRequest $request
     */
    public function updateProfile(UpdateProfileService $service, UpdateProfileRequest $request)
    {
        return $service->handle($request);
    }


    /**
     * Handle incoming request
     *
     * @param GetBillingRekeningService $service
     * @param GetBillingRekeningRequest $request
     */
    public function getRekening(GetBillingRekeningService $service, GetBillingRekeningRequest $request)
    {
        return $service->handle($request);
    }

    /**
     * Handle incoming request
     *
     * @param CreateOrUpdateBillingRekeningService $service
     * @param CreateOrUpdateBillingRekeningRequest $request
     */
    public function createOrUpdateRekening(CreateOrUpdateBillingRekeningService $service, CreateOrUpdateBillingRekeningRequest $request)
    {
        return $service->handle($request);
    }

    /**
     * Handle incoming request
     *
     * @param GetTeamRequest $request
     * @param GetTeamService $service
     */
    public function getTeam(GetTeamRequest $request, GetTeamService $service, $id)
    {
        return $service->handle($id);
    }

    /**
     * Handle incoming request
     *
     * @param GetMemberRequest $request
     * @param GetMemberService $service
     */
    public function getMember(GetMemberRequest $request, GetMemberService $service, $id)
    {
        return $service->handle($id);
    }

    /**
     * @param GetDetailProyekRequest $request
     * @param GetDetailProyekService $service
     * @param $id
     * @return JsonResponse
     */
    public function getDetailProyek(GetDetailProyekRequest $request, GetDetailProyekService $service, $id)
    {
        return $service->handle($id);
    }

    /**
     * @param GetProyekListRequest $request
     * @param GetProyekListService $service
     * @return JsonResponse
     */
    public function getProyekList(GetProyekListRequest $request, GetProyekListService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param GetDesignBriefRequest $request
     * @param GetDesignBriefService $service
     * @return JsonResponse
     */
    public function getDesignBrief(GetDesignBriefRequest $request, GetDesignBriefService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param InsertAnggotaKeProyekRequest $request
     * @param InsertAnggotaKeProyekService $service
     * @return JsonResponse
     */
    public function insertAnggotaKeProyek(InsertAnggotaKeProyekRequest $request, InsertAnggotaKeProyekService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param GetMilestoneRequest $request
     * @param GetMilestoneService $service
     * @return JsonResponse
     */
    public function getMilestone(GetMilestoneRequest $request, GetMilestoneService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param UpdateSelesaiMilestoneRequest $request
     * @param UpdateSelesaiMilestoneService $service
     * @return JsonResponse
     */
    public function updateSelesaiMilestone(UpdateSelesaiMilestoneRequest $request, UpdateSelesaiMilestoneService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param UpdateAcceptMilestoneRequest $request
     * @param UpdateAcceptMilestoneService $service
     * @return JsonResponse
     */
    public function updateAcceptMilestone(UpdateAcceptMilestoneRequest $request, UpdateAcceptMilestoneService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param UpdateTerbayarMilestoneRequest $request
     * @param UpdateTerbayarMilestoneService $service
     * @return JsonResponse
     */
    public function updateTerbayarMilestone(UpdateTerbayarMilestoneRequest $request, UpdateTerbayarMilestoneService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param GetSpesialisasiService $service
     * @return JsonResponse
     */
    public function getSpesialisasi(GetSpesialisasiService $service)
    {
        return $service->handle();
    }

    /**
     * @param UpdateAcceptDesignBriefRequest $request
     * @param UpdateAcceptDesignBriefService $service
     * @return JsonResponse
     */
    public function updateAcceptDesignBrief(UpdateAcceptDesignBriefRequest $request, UpdateAcceptDesignBriefService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param UpdateDesignBriefRequest $request
     * @param UpdateDesignBriefService $service
     * @return JsonResponse
     */
    public function updateDesignBrief(UpdateDesignBriefRequest $request, UpdateDesignBriefService $service)
    {
        return $service->handle($request);
    }

    /**
     * @param InsertChangePasswordService $service
     * @param InsertChangePasswordRequest $request
     * @return JsonResponse
     */
    public function resetPassword(InsertChangePasswordService $service, InsertChangePasswordRequest $request): JsonResponse
    {
        return $service->handle($request);
    }

}
