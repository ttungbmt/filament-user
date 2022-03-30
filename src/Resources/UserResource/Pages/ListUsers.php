<?php

namespace FilamentPro\FilamentUser\Resources\UserResource\Pages;

use FilamentPro\FilamentUser\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
}
