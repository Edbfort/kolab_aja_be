<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ControllerController;
use App\Http\Controllers\CreativeHubAdminController;
use App\Http\Controllers\CreativeHubTeamController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/spesialisasi', [PublicController::class, 'getSpesialisasi']);
//Route::get('/send-email', [EmailController::class, 'sendEmail']);
//Route::get('/send-sms', [\App\Http\Utility\SmsUtility::class, 'sendSms']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('me');
});

Route::middleware('jwt.auth')->group(function () {
    Route::group([
        'prefix' => 'profile'
    ], function ($router) {
        Route::patch('/', [PublicController::class, 'updateProfile'])->name('update_profile');
        Route::get('/{id}', [PublicController::class, 'getProfile'])->name('get_profile');
        Route::post('/change_password', [PublicController::class, 'resetPassword'])->name('reset_password');
    });

    Route::group([
        'prefix' => 'rekening'
    ], function ($router) {
        Route::get('/', [PublicController::class, 'getRekening'])->name('get_rekening');
        Route::post('/', [PublicController::class, 'createOrUpdateRekening'])->name('create_or_update_rekening');
    });

    Route::group([
        'prefix' => 'team'
    ], function ($router) {
        Route::get('/member/{id}', [PublicController::class, 'getMember'])->name('get_member');
        Route::get('/{id}', [PublicController::class, 'getTeam'])->name('get_name');
    });

    Route::group([
        'prefix' => 'proyek'
    ], function ($router) {
        Route::get('/', [PublicController::class, 'getProyekList'])->name('get_project_list');
        Route::post('/tambah-anggota', [PublicController::class, 'insertAnggotaKeProyek'])->name('insert_anggota_ke_proyek');
        Route::get('/milestone', [PublicController::class, 'getMilestone'])->name('get_milestone');
        Route::post('/milestone/selesai', [PublicController::class, 'updateSelesaiMilestone'])->name('update_selesai_milestone');
        Route::post('/milestone/accept', [PublicController::class, 'updateAcceptMilestone'])->name('update_accept_milestone');
        Route::post('/milestone/bayar', [PublicController::class, 'updateTerbayarMilestone'])->name('update_terbayar_milestone');
        Route::get('/{id}', [PublicController::class, 'getDetailProyek'])->name('get_detail_project');
    });

    Route::group([
        'prefix' => 'design-brief'
    ], function ($router) {
        Route::get('/', [PublicController::class, 'getDesignBrief'])->name('get_design_breif');
        Route::post('/', [PublicController::class, 'updateDesignBrief'])->name('update_design_breif');
        Route::post('/accept', [PublicController::class, 'updateAcceptDesignBrief'])->name('update_accept_design_breif');
    });

    // Client Routes
    Route::group([
        'prefix' => 'client'
    ], function ($router) {
        Route::get('/billing', [ClientController::class, 'getBilling'])->name('get_billing');
        Route::patch('/billing', [ClientController::class, 'updateBilling'])->name('update_billing');
        Route::post('/proyek', [ClientController::class, 'insertProyek'])->name('insert_proyek');
        Route::get('/controller-list', [ClientController::class, 'getControllerList'])->name('get_controller_list');
        Route::get('/payment', [ClientController::class, 'getPaymentProyek'])->name('get_payment_proyek');
        Route::post('/payment', [ClientController::class, 'updatePaymentProyek'])->name('update_payment_proyek');
    });

    Route::group([
        'prefix' => 'controller'
    ], function ($router) {
        Route::get('/tambah-milestone', [ControllerController::class, 'getBuatMilestone'])->name('get_buat_milestone');
        Route::post('/tambah-milestone', [ControllerController::class, 'insertBuatMilestone'])->name('insert_buat_milestone');
    });

    Route::group([
        'prefix' => 'creative-hub-team'
    ], function ($router) {
        Route::get('/member', [CreativeHubTeamController::class, 'getMember'])->name('get_member');
        Route::post('/member', [CreativeHubTeamController::class, 'insertMember'])->name('insert_member');
        Route::patch('/member', [CreativeHubTeamController::class, 'updateMember'])->name('update_member');
        Route::post('/lamaran-proyek', [CreativeHubTeamController::class, 'insertLamaranProyek'])->name('insert_lamaran_proyek');
    });

    Route::group([
        'prefix' => 'creative-hub-admin'
    ], function ($router) {
        Route::post('/insert-team', [CreativeHubAdminController::class, 'insertTeam'])->name('insert_team_creative_hub_admin');
    });
});
