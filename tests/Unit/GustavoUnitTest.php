<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class GustavoUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testName()
    {
        $haystack = 'Gustavo Vinicius';
        $needle = 'Gustavo';
        $this->assertStringContainsString($needle, $haystack);
    }
}
