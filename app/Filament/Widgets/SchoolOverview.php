<?php

namespace App\Filament\Widgets;

use App\Models\Campus;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\Teacher;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SchoolOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Schools', School::query()->count()),
            Stat::make('Campuses', Campus::query()->count()),
            Stat::make('Grades', Grade::query()->count()),
            Stat::make('Teachers', Teacher::query()->count()),
            Stat::make('Class Rooms', ClassRoom::query()->count()),
            Stat::make('Student Parents', StudentParent::query()->count()),
            Stat::make('Students', Student::query()->count()),
        ];
    }
}
