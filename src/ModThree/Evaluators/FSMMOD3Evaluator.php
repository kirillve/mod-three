<?php

namespace ModThree\Evaluators;

use FSM\FSM;
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
        $finalStateMapping = [
            'S0' => 0,
            'S1' => 1,
            'S2' => 2,
        ];

        try {
            $resultingState = $this->FSM->evaluate(
                ['S0', 'S1', 'S2'],
                $input,
                'S0',
                ['S0', 'S1', 'S2'],
                [
                    'S0' => [
                        '0' => 'S0',
                        '1' => 'S1',
                    ],
                    'S1' => [
                        '0' => 'S2',
                        '1' => 'S0',
                    ],
                    'S2' => [
                        '0' => 'S1',
                        '1' => 'S2',
                    ],
                ]
            );
        } catch (UnsupportedStateException $exception) {
            throw new ModThreeException('Failed to evaluate mod3 value due to following error: ' . $exception->getMessage());
        }


        return $finalStateMapping[$resultingState];
    }
}
