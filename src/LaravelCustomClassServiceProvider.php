<?php 

namespace Iampapaisarkar\LaravelCustomClass;

use Illuminate\Support\ServiceProvider;
use Iampapaisarkar\LaravelCustomClass\Commands\CustomServiceCommand;
use Iampapaisarkar\LaravelCustomClass\Commands\CustomFactoryCommand;
use Iampapaisarkar\LaravelCustomClass\Commands\CustomTraitCommand;

class LaravelCustomClassServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CustomServiceCommand::class,
                CustomFactoryCommand::class,
                CustomTraitCommand::class
            ]);
        }
    }

    public function register()
    {
        // ...
    }
}