<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\DB;

class StudentsPerGradeChart extends ChartWidget
{
    protected static ?string $heading = 'Students per Grade';

    protected function getData(): array
    {
        $data = DB::table('students')
            ->select('grades.name as grade', DB::raw('count(students.id) as total'))
            ->join('grades', 'students.grade_id', '=', 'grades.id')
            ->groupBy('grades.name')
            ->pluck('total', 'grade');

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Students per Grade',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'], // Adjust colors as needed
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
