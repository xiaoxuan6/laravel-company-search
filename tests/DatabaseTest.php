<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelPackageSkeleton\Tests;

use Exception;
use Illuminate\Foundation\Application;
use Vinhson\LaravelPackageSkeleton\Tests\Models\Author;
use Vinhson\LaravelPackageSkeleton\Tests\Seeder\AuthorSeeder;

class DatabaseTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        $this->withFactories(__DIR__ . '/Factories/');

//        $this->seed(AuthorSeeder::class);
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
//        $app['config']->set('database.default', 'mysql');
//
//        $app['config']->set('database.connections.mysql', [
//            'driver' => 'mysql',
//            'host' => '127.0.0.1',
//            'port' => '3306',
//            'database' => 'root',
//            'username' => 'root',
//            'password' => 'root',
//            'prefix' => '',
//        ]);

        $app['config']->set('database.default', 'sqlite');

        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    public function testAuthors()
    {
        $this->seed(AuthorSeeder::class);

        $authors = Author::query()->get();

        $this->assertEquals(5, $authors->count());
    }
}
