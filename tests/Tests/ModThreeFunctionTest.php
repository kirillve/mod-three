<?php

namespace Tests;

use function modThree;

use PHPUnit\Framework\TestCase;

class ModThreeFunctionTest extends TestCase
{
    public function testBasicInput(): void
    {
        $this->assertEquals(0, modThree('0000'));
        $this->assertEquals(1, modThree('0001'));
        $this->assertEquals(2, modThree('0010'));
        $this->assertEquals(0, modThree('0011'));
    }
}
