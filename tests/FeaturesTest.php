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

use Mockery;
use Vinhson\LaravelCompanySearch\{Facades\LaravelCompanySearch, LaravelCompanySearchHandler, LaravelCompanySearchManager, ResultResponse};

class FeaturesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearch()
    {
        $result = LaravelCompanySearch::search('91411400MA46DL7H1G');

        $this->assertTrue($result->isSuccess(), $result->getReason());
        $this->assertFalse($result->isFail(), $result->getReason());
        $this->assertIsArray($result->getInvestorList(), $result->getReason());
        $this->assertNotEmpty($result->getInvestorList(), $result->getReason());
    }

    public function testLaravelCompanySearchHandler()
    {
        $mock = Mockery::mock(LaravelCompanySearchHandler::class)
            ->shouldReceive('search')
            ->with('91411400MA46DL7H1G')
            ->once()
            ->andReturn($this->getResponse())
            ->getMock();

        /** @var $result ResultResponse */
        $result = $mock->search('91411400MA46DL7H1G');

        $this->assertTrue($result->isSuccess(), $result->getReason());
        $this->assertFalse($result->isFail(), $result->getReason());
        $this->assertIsArray($result->getInvestorList(), $result->getReason());
        $this->assertNotEmpty($result->getInvestorList(), $result->getReason());

        $this->assertIsArray($result->getBaseInfo(), $result->getReason());
        $this->assertNotEmpty($result->getBaseInfo(), $result->getReason());
    }

    public function testLaravelCompanySearchManager()
    {
        $mock = Mockery::mock(LaravelCompanySearchManager::class)
            ->shouldReceive('search')
            ->with('91411400MA46DL7H1G')
            ->once()
            ->andReturn($this->getResponse())
            ->getMock();

        $this->app->instance(LaravelCompanySearchManager::class, $mock);

        $manager = $this->app->make(LaravelCompanySearchManager::class);
        /** @var $result ResultResponse */
        $result = $manager->search('91411400MA46DL7H1G');


        $this->assertTrue($result->isSuccess(), $result->getReason());
        $this->assertFalse($result->isFail(), $result->getReason());
        $this->assertIsArray($result->getInvestorList(), $result->getReason());
        $this->assertNotEmpty($result->getInvestorList(), $result->getReason());

        $this->assertIsArray($result->getBaseInfo(), $result->getReason());
        $this->assertNotEmpty($result->getBaseInfo(), $result->getReason());
    }

    private function getResponse(): ResultResponse
    {
        return new ResultResponse([
            'status' => 200,
            'data' => json_decode(file_get_contents(__DIR__ . '/../data.json'), true),
            'msg' => 'ok'
        ]);
    }
}
