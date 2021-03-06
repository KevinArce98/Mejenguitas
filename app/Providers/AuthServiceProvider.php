<?php

namespace Mejenguitas\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Mejenguitas\Policies\UserPolicy;
use Mejenguitas\Policies\MessagePolicy;
use Mejenguitas\User;
use Mejenguitas\Message;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::Class,
        Message::class => MessagePolicy::Class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
