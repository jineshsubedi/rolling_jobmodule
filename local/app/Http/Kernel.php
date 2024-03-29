<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \App\Http\Middleware\HttpsProtocol::class,
            \App\Http\Middleware\UserActivity::class,

        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        "role"      => \App\Http\Middleware\RoleMiddleware::class,
        'employee' => \App\Http\Middleware\employeeAuth::class,
        'employer' => \App\Http\Middleware\employerAuth::class,
        'marketer' => \App\Http\Middleware\marketerAuth::class,
        'staffs' => \App\Http\Middleware\staffsAuth::class,
        'supervisor' => \App\Http\Middleware\supervisorAuth::class,
        'branchadmin' => \App\Http\Middleware\branchAdminAuth::class,
        'onboard' => \App\Http\Middleware\isOnBoard::class,
    ];
}
