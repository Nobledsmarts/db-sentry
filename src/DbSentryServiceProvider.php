<?php

namespace Nobledsmarts\DBSentry;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Nobledsmarts\DBSentry\Commands\DBSentryCommand;

class DBSentryServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('db-sentry')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_db-sentry_table')
            ->hasCommand(DBSentryCommand::class);
    }
}
