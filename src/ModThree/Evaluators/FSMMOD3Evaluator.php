<?php

namespace ModThree\Evaluators;

use FSM\UnsupportedStateException;
use ModThree\BinaryStringObject;
use ModThree\EvaluatorInterface;
use ModThree\ModThreeException;

class FSMMOD3Evaluator implements EvaluatorInterface
{
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
            $result = (new BinaryStringObject($input))->mod3();
        } catch (UnsupportedStateException $exception) {
            throw new ModThreeException('Failed to evaluate mod3 value due to following error: ' . $exception->getMessage());
        }

        return (int)$result;
    }
}
