<?php

namespace App\Providers\Filament;

use App\Filament\Auth\CustomRegister;
use App\Http\Middleware\RedirectLogoutUserToHomePage;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
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
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class DoctorPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        try {
            $brandName = settings()->get('general.site_name');
            $brandLogoHeight = settings()->get('general.site_logo_height');
        } catch (Throwable) {
            $brandName = null;
            $brandLogoHeight = null;
        }

        return $panel
            ->id('doctor')
            ->path('doctor')
            ->login()
            ->registration(CustomRegister::class)
            ->profile()
            ->topNavigation()
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Slate,
                'info' => Color::Blue,
                'primary' => Color::Green,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->favicon(file_exists($favIcon = storage_path('app/public/favicon.png')) ? asset('storage/favicon.png').'?v='.md5_file($favIcon) : null)
            ->brandLogo(file_exists($logo = storage_path('app/public/logo.png')) ? asset('storage/logo.png').'?v='.md5_file($logo) : null)
            ->brandName($brandName ?? config('app.name'))
            ->brandLogoHeight($brandLogoHeight ?? '40px')
            ->discoverResources(in: app_path('Filament/Doctor/Resources'), for: 'App\\Filament\\Doctor\\Resources')
            ->discoverPages(in: app_path('Filament/Doctor/Pages'), for: 'App\\Filament\\Doctor\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Doctor/Widgets'), for: 'App\\Filament\\Doctor\\Widgets')
            ->widgets([
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
                RedirectLogoutUserToHomePage::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
