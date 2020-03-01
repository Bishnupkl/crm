<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Counselor;
use App\Models\Partner;
use App\Models\Reception;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class RelationshipServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap(
            [
                'admin'     => Admin::class,
                'reception'    => Reception::class,
                'counselor'   => Counselor::class,
                'partner'   => Partner::class,
            ]
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
