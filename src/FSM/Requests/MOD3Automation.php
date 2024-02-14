<?php

namespace FSM\Requests;

use FSM\FiveTuplesRequestInterface;

class MOD3Automation implements FiveTuplesRequestInterface
{
    use FiveTuplesTrait;

    public function __construct(string $input)
    {
        $this->availableStates = ['S0', 'S1', 'S2'];
        $this->alphabet = $input;
        $this->initialState = 'S0';
        $this->finalStates = ['S0', 'S1', 'S2'];
        $this->transition = [
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
        ];
    }
}
