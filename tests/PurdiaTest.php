<?php

namespace Anggagewor\Purdia\Tests;

use Anggagewor\Purdia\Facades\Purdia;
use Anggagewor\Purdia\ServiceProvider;
use Orchestra\Testbench\TestCase;

class PurdiaTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'purdia' => Purdia::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
