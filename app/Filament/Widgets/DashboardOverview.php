<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DashboardOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $usersCount = User::query()->where('is_admin', false)->count();

        $todoCount = 900;

        return [
            Card::make('Users', $usersCount)
                ->description('Total Subscribers')
                ->descriptionIcon('heroicon-s-users')
                ->color('success'),
            Card::make('Todos', $todoCount)
                ->description("Total Todos")
                ->descriptionIcon('heroicon-s-briefcase')
                ->color('primary')
        ];
    }
}
