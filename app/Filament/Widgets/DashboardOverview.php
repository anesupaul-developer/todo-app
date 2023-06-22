<?php

namespace App\Filament\Widgets;

use App\Models\Todo;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DashboardOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $usersCount = User::query()->where('is_admin', false)->count();

        $pendingTodoCount = Todo::query()->where('is_completed', false)->count();

        $completedTodoCount = Todo::query()->where('is_completed', true)->count();

        return [
            Card::make('Users', $usersCount)
                ->description('Total Subscribers')
                ->descriptionIcon('heroicon-s-users')
                ->color('primary'),
            Card::make('Todos', $pendingTodoCount)
                ->description("Pending Todos")
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger'),
            Card::make('Todos', $completedTodoCount)
                ->description("Completed Todos")
                ->descriptionIcon('heroicon-s-check')
                ->color('success')
        ];
    }
}
