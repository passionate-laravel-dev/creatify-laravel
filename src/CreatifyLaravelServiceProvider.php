<?php

namespace Passionatelaraveldev\CreatifyLaravel;

use Passionatelaraveldev\CreatifyLaravel\Commands\CreatifyLaravelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CreatifyLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('creatify-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_creatify_laravel_table')
            ->hasCommand(CreatifyLaravelCommand::class);
    }
}
