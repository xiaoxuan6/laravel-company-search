<?php
/**
 * This file is part of james.xue/laravel-company-search.
 *
 * (c) xiaoxuan6 <1527736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelCompanySearch\Tests;

use Illuminate\Foundation\Application;
use Vinhson\LaravelCompanySearch\Facades\LaravelCompanySearch;
use Vinhson\LaravelCompanySearch\LaravelCompanySearchServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Define environment setup.
     *
     * @param Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('search.appcode', '');
    }

    /**
     * Get package providers.
     *
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelCompanySearchServiceProvider::class
        ];
    }

    /**
     * Get package aliases.
     *
     * @param Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            'laravel-company-search' => LaravelCompanySearch::class
        ];
    }
}
