<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelCompanySearch\Facades;

use RuntimeException;
use Illuminate\Support\Facades\Facade;
use Vinhson\LaravelCompanySearch\ResultResponse;

/**
 * @method static ResultResponse search(string $key)
 */
class LaravelCompanySearch extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-company-search';
    }
}
