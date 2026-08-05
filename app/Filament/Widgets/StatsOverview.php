<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use App\Models\Donation;
use App\Models\TrainingEnrollment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = -2;

    protected function getStats(): array
    {
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $pendingDonations = Donation::where('status', 'en_attente')->count();

        $recentEnrollments = TrainingEnrollment::where('created_at', '>=', now()->subDays(7))
            ->latest()
            ->get();

        return [
            Stat::make('Messages non lus', $unreadMessages)
                ->description('Formulaire de contact')
                ->descriptionIcon('heroicon-o-envelope')
                ->color($unreadMessages > 0 ? 'warning' : 'success'),

            Stat::make('Dons en attente', $pendingDonations)
                ->description('En attente de confirmation')
                ->descriptionIcon('heroicon-o-heart')
                ->color($pendingDonations > 0 ? 'warning' : 'success'),

            Stat::make('Inscriptions Academy (7 j.)', $recentEnrollments->count())
                ->description($recentEnrollments->first()?->nom ?? 'Aucune inscription récente')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('primary'),
        ];
    }
}
