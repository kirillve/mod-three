<?php

namespace Tests\FSM;

use FSM\Event;
use FSM\StatefulContext;
use FSM\UnsupportedStateException;
use PHPUnit\Framework\TestCase;

class StatefulContextTest extends TestCase
{
    public function testSimpleState(): void
    {
        $statefulContext = new StatefulContext(
            ['S0'],
            ['S0'],
            [
                'S0' => [
                    '0' => 'S0',
                ],
            ],
            'S0'
        );
        $statefulContext->transitState(new Event('0'));
        $this->assertEquals('S0', $statefulContext->getFinalState());

        $statefulContext = new StatefulContext(
            ['S0', 'S1'],
            ['S1'],
            [
                'S0' => [
                    '0' => 'S1',
                ],
            ],
            'S0'
        );
        $statefulContext->transitState(new Event('0'));
        $this->assertEquals('S1', $statefulContext->getFinalState());
    }

    public function testUnsupportedResultingState(): void
    {
        $statefulContext = new StatefulContext(
            ['S0', 'S1'],
            ['S0'],
            [
                'S0' => [
                    '0' => 'S1',
                ],
            ],
            'S0'
        );
        $statefulContext->transitState(new Event('0'));
        $this->expectException(UnsupportedStateException::class);
        $this->assertEquals('S1', $statefulContext->getFinalState());
    }

    public function testUnsupportedInitialState(): void
    {
        $this->expectException(UnsupportedStateException::class);
        $statefulContext = new StatefulContext(
            ['S0'],
            ['S0'],
            [
                'S0' => [
                    '0' => 'S0',
                ],
            ],
            'S1'
        );
        $statefulContext->transitState(new Event('0'));
        $this->assertEquals('S1', $statefulContext->getFinalState());
    }
}
