<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Schema;

use Filament\Facades\Filament;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentAsset::register([
            Js::make('custom-scriptdd', __DIR__ . '/../../resources/js/AdminCustom.js'),
        ]);

        if (Schema::hasTable('languages')) {
            $locales = \App\Models\Language::active()->get()->map(function ($language) {
                return [
                    'label' => $language->name,
                    'code' => $language->code,
                    'icon' => $language->icon, // Assuming you have a URL to the flag icon stored in your database
                ];
            })->toArray();
        
            LanguageSwitch::configureUsing(function (LanguageSwitch $languageSwitch) use ($locales) {
                $flags = [];
                foreach ($locales as $locale) {
                    // Generate the full URL for the image
                    $flags[$locale['code']] = asset('storage/' . $locale['icon']);
                }
                $languageSwitch
                    ->locales(array_column($locales, 'code'))
                    ->visible(outsidePanels: true)
                    ->labels(array_column($locales, 'label'))
                    ->flags($flags) // Pass the generated flag URLs
                    // ->circular()
                    ->outsidePanelPlacement(Placement::TopCenter);
            });
            
        }
        

    }

    
}
