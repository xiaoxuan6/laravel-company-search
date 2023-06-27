<?php
/**
 * This file is part of james.xue/laravel-company-search.
 *
 * (c) xiaoxuan6 <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelCompanySearch;

use Illuminate\Support\ServiceProvider;

class LaravelCompanySearchServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected bool $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/search.php' => config_path('search.php')
            ], 'laravel-company-search');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     *
     * @see \Illuminate\Container\Container
     */
    public function register(): void
    {
        $this->app->singleton('laravel-company-search', function ($app): LaravelCompanySearchManager {
            return new LaravelCompanySearchManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            'laravel-company-search'
        ];
    }
}
