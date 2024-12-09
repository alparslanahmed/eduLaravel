<?php

namespace App\Filament\Resources\StudentParentResource\Pages;

use App\Filament\Resources\StudentParentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentParent extends EditRecord
{
    protected static string $resource = StudentParentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
