<?php

namespace App\Filament\Resources\StudentParentResource\Pages;

use App\Filament\Resources\StudentParentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentParents extends ListRecords
{
    protected static string $resource = StudentParentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
