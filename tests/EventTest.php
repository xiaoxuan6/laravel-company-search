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

use Illuminate\Support\Facades\Event;
use Vinhson\LaravelPackageSkeleton\Models\Author;
use Vinhson\LaravelPackageSkeleton\Events\Event as BaseEvent;

class EventTest extends DatabaseTest
{
    protected function setUp(): void
    {
        parent::setUp();

        Event::fake();
    }

    public function testEvent()
    {
        $author = Author::create(['name' => 'vinhson']);

        Event::assertDispatched(BaseEvent::class, function (BaseEvent $event) use ($author) {
            return $event->author->name === $author->name;
        });

        Event::assertDispatched(BaseEvent::class, 1);
    }
}
