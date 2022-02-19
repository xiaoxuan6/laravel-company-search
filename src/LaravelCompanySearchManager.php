<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelCompanySearch;

use Illuminate\Support\Manager;

class LaravelCompanySearchManager extends Manager
{
    /**
     * @inheritDoc
     */
    public function getDefaultDriver(): string
    {
        return $this->config->get('search.default', 'search');
    }

    /**
     * @return LaravelCompanySearchHandler
     */
    public function createSearchDriver(): LaravelCompanySearchHandler
    {
        $driver = $this->getDefaultDriver();

        $config = $this->config->get("search.connections.$driver");

        return new LaravelCompanySearchHandler($config);
    }
}
