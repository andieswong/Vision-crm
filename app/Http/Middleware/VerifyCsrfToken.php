<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/sms',
        'http://80756a4a.ngrok.io/api/sms',
        'https://www.visioncallcenter.online/api/sms',
    ];
}
