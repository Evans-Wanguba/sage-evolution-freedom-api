<?php

/**
 * @Author: Evans Wanguba
 * @Date:   2020-01-10 14:02:33
 * @Last Modified by:   Evans Wanguba
 * @Last Modified time: 2021-07-16 17:15:18
 */

namespace EvansWanguba\Sage;

use Illuminate\Support\ServiceProvider;
use EvansWanguba\Sage\SageEvolutionFreedom;

class SageEvolutionFreedomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SageEvolutionFreedom::class, function () {
            return new SageEvolutionFreedom();
        });
    }
}
