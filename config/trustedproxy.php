<?php

use Symfony\Component\HttpFoundation\Request;

return [

    /*
    |--------------------------------------------------------------------------
    | Trusted Proxies
    |--------------------------------------------------------------------------
    |
    | Here you may specify the trusted proxies for your application. This is
    | useful if you are using a proxy that modifies the forwarded-for header
    | and you want to make sure your application can detect the actual IP.
    |
    */

    'proxies' => env('TRUSTED_PROXIES', null),

    /*
    |--------------------------------------------------------------------------
    | Trusted Headers
    |--------------------------------------------------------------------------
    |
    | Here you may specify which headers should be used to detect proxies. By
    | default, the X-Forwarded-For header is used, but you can change it to
    | match the needs of your application or your hosting environment.
    |
    | Available headers: "HEADER_X_FORWARDED_FOR", "HEADER_X_FORWARDED_HOST",
    |                    "HEADER_X_FORWARDED_PORT", "HEADER_X_FORWARDED_PROTO",
    |                    "HEADER_X_FORWARDED_AWS_ELB"
    |
    */

    'headers' => Request::HEADER_X_FORWARDED_FOR | Request::HEADER_X_FORWARDED_HOST | Request::HEADER_X_FORWARDED_PORT | Request::HEADER_X_FORWARDED_PROTO,

];
