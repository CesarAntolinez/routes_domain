<?php

namespace App\Http\Controllers;

use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Repositories\WebsiteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

class CreateTenantController extends Controller
{
    public function create_tenant()
    {
        $website = new Website;
        // Implement custom random hash using Laravels Str::random
        $website->uuid = Str::random(10);
        app(WebsiteRepository::class)->create($website);
        //dd($website->uuid); // Random string of length 10

        $hostname = new Hostname;
        $hostname->fqdn = 'foo.dominio-dos.test';
        $hostname = app(HostnameRepository::class)->create($hostname);
        app(HostnameRepository::class)->attach($hostname, $website);
        //dd($website->hostnames); // Collection with $hostname

        return $website->hostnames;
    }
}
