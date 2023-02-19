<?php

use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProjectUnitController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

//Get Users with roles
Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    $user = $request->user();
    $roles = $request->user()->getPermissionsViaRoles()->first();
    return response($user, 200);
});
//get current user roles
Route::middleware(['auth:api'])->get('/user-role', function (Request $request) {
    return $request->user()->getRoleNames()->first();
});
//.Login
Route::post('login', [PassportAuthController::class, 'login'])->middleware();
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return response(['message' => 'Email successfully Verified'], 200);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::group(['middleware' => ['auth:api']], function() {
    Route::resource('roles', RoleController::class);
    Route::post('/logout', [PassportAuthController::class, 'logout']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);

    Route::get('project', [ProjectsController::class, 'index']);
    Route::get('project/{id}', [ProjectsController::class, 'show']);
    Route::post('project', [ProjectsController::class, 'store']);
    Route::put('project/{id}', [ProjectsController::class, 'update']);
    Route::delete('project/{id}', [ProjectsController::class, 'destroy']);

    Route::resource('project-unit', ProjectUnitController::class);

    Route::resource('issue', IssueController::class);
    Route::post('issue/resolve/{id}', [IssueController::class, 'resolve']);

    Route::resource('comment', CommentController::class);

//    Route::get('forget-password', [PasswordResetController::class, 'showForgetPasswordForm']);
    Route::post('forget-password', [PasswordResetController::class, 'submitForgetPasswordRequest']);
    Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm']);
    Route::post('reset-password', [PasswordResetController::class, 'submitResetPasswordForm']);
});




