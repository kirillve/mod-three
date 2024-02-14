<?php

namespace Tests\FSM;

use FSM\FSM;
use FSM\UnsupportedStateException;
use PHPUnit\Framework\TestCase;

class FSMTest extends TestCase
{
    private FSM $FSM;

    #[\Override]
    public function setUp(): void
    {
        $this->FSM = new FSM();
    }

    public function testSimpleState(): void
    {
        $this->assertEquals('S0', $this->FSM->evaluate(
            ['S0'],
            '00',
            'S0',
            ['S0'],
            [
                'S0' => [
                    '0' => 'S0',
                ],
            ]
        ));
        $this->assertEquals('S1', $this->FSM->evaluate(
            ['S0'],
            '01',
            'S0',
            ['S1'],
            [
                'S0' => [
                    '0' => 'S0',
                    '1' => 'S1',
                ],
            ]
        ));
        $this->assertEquals('S0', $this->FSM->evaluate(
            ['S0'],
            '010',
            'S0',
            ['S0'],
            [
                'S0' => [
                    '0' => 'S0',
                    '1' => 'S1',
                ],
                'S1' => [
                    '0' => 'S0',
                    '1' => 'S0',
                ],
            ]
        ));
    }

    public function testUnsupportedResultingState(): void
    {
        $this->expectException(UnsupportedStateException::class);
        $this->assertEquals('S0', $this->FSM->evaluate(
            ['S0'],
            '0',
            'S0',
            ['S0'],
            [
                'S0' => [
                    '0' => 'S2',
                ],
            ]
        ));
    }

    public function testUnsupportedInitialState(): void
    {
        $this->expectException(UnsupportedStateException::class);
        $this->assertEquals('S0', $this->FSM->evaluate(
            ['S0'],
            '0',
            'S2',
            ['S0'],
            [
                'S0' => [
                    '0' => 'S0',
                ],
            ]
        ));
    }
}
