<?php

namespace FilamentPro\FilamentUser\Resources\UserResource\Pages;

use Filament\Resources\Pages\ListRecords;
use FilamentPro\FilamentUser\Resources\UserResource;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
}
