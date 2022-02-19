<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelPackageSkeleton\Models;

use Illuminate\Database\Eloquent\Model;
use Vinhson\LaravelPackageSkeleton\Events\Event;

class Author extends Model
{
    protected $fillable = ['name'];

    protected $dispatchesEvents = [
        'created' => Event::class,
    ];
}
