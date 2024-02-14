<?php

namespace Tests\ModThree;

use FSM\FSM;
use FSM\OutputHandlers\MOD3OutputHandler;
use ModThree\Evaluators\FSMMOD3Evaluator;
use ModThree\ModThree;
use Override;
use PHPUnit\Framework\TestCase;

class ModThreeTest extends TestCase
{
    private ModThree $modThree;

    #[Override]
    public function setUp(): void
    {
        $this->modThree = new ModThree(new FSMMOD3Evaluator(new FSM(new MOD3OutputHandler())));
    }

    public function testBasicInput(): void
    {
        $this->assertEquals(0, $this->modThree->evaluate('0000'));
        $this->assertEquals(1, $this->modThree->evaluate('0001'));
        $this->assertEquals(2, $this->modThree->evaluate('0010'));
        $this->assertEquals(0, $this->modThree->evaluate('0011'));
        $this->assertEquals(0, $this->modThree->evaluate('0011'));
    }
}
