<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $mal = Country::where('country_code', 'mal')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($mal->name.'Employees', $mal->employees_count),

        ];
    }
}
