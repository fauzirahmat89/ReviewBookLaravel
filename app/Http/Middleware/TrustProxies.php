<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Percaya semua proxy (Railway/Heroku menggunakan reverse proxy).
     * Bisa juga diganti IP proxy tertentu kalau mau ketat.
     */
    protected $proxies = '*';
 


    /**
     * Header yang dipercaya untuk menentukan skema dan host.
     */
   protected $headers = \Illuminate\Http\Request::HEADER_X_FORWARDED_ALL
    | \Illuminate\Http\Request::HEADER_X_FORWARDED_AWS_ELB;
}

