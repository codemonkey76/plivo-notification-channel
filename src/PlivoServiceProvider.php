<?php

namespace Codemonkey76\Plivo;

use Illuminate\Support\ServiceProvider;

class PlivoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->when(PlivoChannel::class)
            ->needs(Plivo::class)
            ->give(fn() => new Plivo(config('services.plivo')));
    }
}
