<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class DeliveryBoyPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('deliveryBoy')
            ->path('deliveryBoy')
            ->login()
            ->unsavedChangesAlerts(false)
            // ->passwordReset()
            // ->emailVerification()
            ->profile()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->maxContentWidth('full')
            ->font('Poppins')
            ->favicon(url('admincon/assets/images/favicon/favicon.png'))
            ->brandLogo(url('admincon/assets/images/logo/gconlogo.png'))
            ->sidebarCollapsibleOnDesktop()
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            // Created by DK END
            ->discoverResources(in: app_path('Filament/DeliveryBoy/Resources'), for: 'App\\Filament\\DeliveryBoy\\Resources')
            ->discoverPages(in: app_path('Filament/DeliveryBoy/Pages'), for: 'App\\Filament\\DeliveryBoy\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/DeliveryBoy/Widgets'), for: 'App\\Filament\\DeliveryBoy\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
