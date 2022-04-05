<?php

namespace FilamentPro\FilamentUser\Resources\UserResource\Pages;

use FilamentPro\FilamentUser\Resources\UserResource;
use FilamentPro\Resources\Pages\ManageRecords;

class ManageUser extends ManageRecords
{
    protected static string $resource = UserResource::class;

    protected function getCreateFormSchema(): array
    {
        return $this->getResourceForm(columns: 2)->getSchema();
    }

    protected function getEditFormSchema(): array
    {
        return $this->getCreateFormSchema();
    }
}
