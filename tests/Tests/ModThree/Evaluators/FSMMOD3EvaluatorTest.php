<?php

namespace Tests\ModThree\Evaluators;

use ModThree\Evaluators\FSMMOD3Evaluator;
use ModThree\ModThreeException;
use PHPUnit\Framework\TestCase;

class FSMMOD3EvaluatorTest extends TestCase
{
    private FSMMOD3Evaluator $evaluator;

    #[\Override]
    public function setUp(): void
    {
        $this->evaluator = new FSMMOD3Evaluator();
    }

    public function testInvalidInputException(): void
    {
        $this->expectException(ModThreeException::class);
        $this->assertEquals(1, $this->evaluator->evaluate('a123'));
    }

    public function testBasicInput(): void
    {
        $this->assertEquals(0, $this->evaluator->evaluate('0000'));
        $this->assertEquals(1, $this->evaluator->evaluate('0001'));
        $this->assertEquals(2, $this->evaluator->evaluate('0010'));
        $this->assertEquals(0, $this->evaluator->evaluate('0011'));
    }

    public function testInt32Edges(): void
    {
        $this->assertEquals(1, $this->evaluator->evaluate('01111111111111111111111111111111'));
        $this->assertEquals(2, $this->evaluator->evaluate('10000000000000000000000000000000'));
    }

    public function testUInt32Edges(): void
    {
        $this->assertEquals(0, $this->evaluator->evaluate('11111111111111111111111111111111'));
        $this->assertEquals(1, $this->evaluator->evaluate('100000000000000000000000000000000'));
    }

    public function testInt64Edges(): void
    {
        $this->assertEquals(
            1,
            $this->evaluator->evaluate('0111111111111111111111111111111111111111111111111111111111111111')
        );
        $this->assertEquals(
            1,
            $this->evaluator->evaluate('10000000000000000000000000000000000000000000000000000000000000000')
        );
        $this->assertEquals(
            0,
            $this->evaluator->evaluate('1111111111111111111111111111111111111111111111111111111111111111')
        );
    }
}
