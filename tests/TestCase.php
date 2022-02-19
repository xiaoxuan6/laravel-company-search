<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelCompanySearch\Tests;

use Illuminate\Foundation\Application;
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
        $app['config']->set('search.default', 'search');

        $app['config']->set('search.connections.search', [
            'appcode' => '******',
        ]);
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
}
