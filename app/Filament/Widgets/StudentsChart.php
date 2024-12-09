<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class StudentsChart extends ChartWidget
{
    protected static ?string $heading = 'Students per Day';

    protected function getData(): array
    {
        $data = Trend::model(Student::class)
            ->between(now()->startOfMonth(), now()->endOfMonth())
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Students',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date)
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
