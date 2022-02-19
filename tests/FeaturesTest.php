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

use Vinhson\LaravelCompanySearch\Facades\LaravelCompanySearch;

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
        $this->assertTrue($result->isFail(), $result->getReason());
        $this->assertIsArray($result->getInvestorList(), $result->getReason());
        $this->assertNotEmpty($result->getInvestorList(), $result->getReason());
    }
}
