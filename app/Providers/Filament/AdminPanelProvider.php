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

use Filament\Navigation\MenuItem;
use App\Filament\Pages\Auth\ChangePassword;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // ->unsavedChangesAlerts(condition: false)
            // ->spa()
            // ->registration()
            ->unsavedChangesAlerts(false)
            ->passwordReset()
            ->emailVerification()
            ->profile()
            // Created by DK START
            
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => Color::Pink,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->maxContentWidth('full')
            ->font('Poppins')
            ->favicon(url('admincon/assets/images/favicon/favicon.png'))
            ->brandLogo(url('admincon/assets/images/logo/gconlogo.png'))
            ->sidebarCollapsibleOnDesktop()
            ->userMenuItems([
                // 'profile' => MenuItem::make('profile')
                //     ->label(fn (): string => 'Profile')
                //     ->url(fn (): string => Profile::getUrl()),

                'change-password' => MenuItem::make('Change Password')
                    ->url(fn (): string => ChangePassword::getUrl())
                    ->label(fn (): string => 'Change Password')
                    ->icon('heroicon-s-lock-closed'),
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
              // Created by DK END
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
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

            // LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            //     $switch
            //         ->visible(outsidePanels: true);
                  
            // });

    }

}
