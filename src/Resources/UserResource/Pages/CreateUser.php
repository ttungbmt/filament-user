<?php

namespace FilamentPro\FilamentUser\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use FilamentPro\FilamentUser\Resources\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
