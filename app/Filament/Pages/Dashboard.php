<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardOverview;
use Filament\Pages\Dashboard as BasePage;

class Dashboard extends BasePage
{
    protected function getColumns(): int | string | array
    {
        return 2;
    }

    protected function getWidgets(): array
    {
        return [
            DashboardOverview::class
        ];
    }
}
