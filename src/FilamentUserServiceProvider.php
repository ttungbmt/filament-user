<?php

namespace FilamentPro\FilamentUser;

use Filament\PluginServiceProvider;
use FilamentPro\FilamentUser\Resources\UserResource;
use Spatie\LaravelPackageTools\Package;

class FilamentUserServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        UserResource::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-user')
            ->hasConfigFile();
    }
}
