<?php

namespace Tests\FSM;

use FSM\FSM;
use FSM\OutputHandlers\StatePassThroughOutputHandler;
use FSM\Requests\FiveTuplesRequest;
use FSM\UnsupportedStateException;
use PHPUnit\Framework\TestCase;

class FSMTest extends TestCase
{
    private FSM $FSM;

    #[\Override]
    public function setUp(): void
    {
        $this->FSM = new FSM(new StatePassThroughOutputHandler());
    }

    public function testSimpleState(): void
    {
        $this->assertEquals('S0', $this->FSM->evaluate(new FiveTuplesRequest(
            ['S0'],
            '00',
            'S0',
            ['S0'],
            [
                'S0' => [
                    '0' => 'S0',
                ],
            ]
        )));
        $this->assertEquals('S1', $this->FSM->evaluate(new FiveTuplesRequest(
            ['S0', 'S1'],
            '01',
            'S0',
            ['S1'],
            [
                'S0' => [
                    '0' => 'S0',
                    '1' => 'S1',
                ],
            ]
        )));
        $this->assertEquals('S0', $this->FSM->evaluate(new FiveTuplesRequest(
            ['S0', 'S1'],
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
        )));
    }

    public function testUnsupportedResultingState(): void
    {
        $this->expectException(UnsupportedStateException::class);
        $this->assertEquals('S0', $this->FSM->evaluate(new FiveTuplesRequest(
            ['S0'],
            '0',
            'S0',
            ['S0'],
            [
                'S0' => [
                    '0' => 'S2',
                ],
            ]
        )));
    }

    public function testUnsupportedInitialState(): void
    {
        $this->expectException(UnsupportedStateException::class);
        $this->assertEquals('S0', $this->FSM->evaluate(new FiveTuplesRequest(
            ['S0'],
            '0',
            'S2',
            ['S0'],
            [
                'S0' => [
                    '0' => 'S0',
                ],
            ]
        )));
    }
}
