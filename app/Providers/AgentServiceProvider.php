<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;

class AgentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $agent = new Agent();

        View::share('agent', $agent);
    }
}
