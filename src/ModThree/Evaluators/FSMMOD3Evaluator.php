<?php

namespace ModThree\Evaluators;

use FSM\FSM;
use FSM\Requests\MOD3Automation;
use FSM\UnsupportedStateException;
use ModThree\EvaluatorInterface;
use ModThree\ModThreeException;

class FSMMOD3Evaluator implements EvaluatorInterface
{
    public function __construct(private readonly FSM $FSM)
    {
    }

    /**
     * @param string $input
     *
     * @throws ModThreeException
     *
     * @return int
     */
    #[\Override]
    public function evaluate(string $input): int
    {
        try {
            $result = $this->FSM->evaluate(new MOD3Automation($input));
        } catch (UnsupportedStateException $exception) {
            throw new ModThreeException('Failed to evaluate mod3 value due to following error: ' . $exception->getMessage());
        }

        return (int)$result;
    }
}
