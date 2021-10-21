<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;
class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'adminer', 'paddle', 'webhooks/mollie',
    ];

    private $openRoutes =
    [
        'public/storage/resto_logo','public/storage/resto_cover',
    ];

    public function handle($request, Closure $next)
    {
        foreach($this->openRoutes as $route)
        {
            if ($request->is($route))
            {
                return $next($request);
            }
        }
        return parent::handle($request, $next);
    }


}
