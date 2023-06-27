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

use InvalidArgumentException;
use Illuminate\Support\Manager;

class LaravelCompanySearchManager extends Manager
{
    private $instance;

    /**
     * Get a driver instance.
     *
     * @throws InvalidArgumentException
     */
    public function driver($driver = null)
    {
        if (empty($this->instance)) {
            $this->instance = $this->createSearchDriver();
        }

        return $this->instance;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultDriver(): string
    {
        return '';
    }

    /**
     * @return LaravelCompanySearchHandler
     */
    public function createSearchDriver(): LaravelCompanySearchHandler
    {
        return new LaravelCompanySearchHandler($this->config);
    }
}
