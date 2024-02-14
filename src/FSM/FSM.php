<?php

namespace FSM;

class FSM
{
    /**
     * @param string[] $availableStates
     * @param string[] $finalStates
     * @param string[][] $transition
     *
     * @throws UnsupportedStateException
     *
     * @return string
     */
    public function evaluate(
        array $availableStates,
        string $alphabet,
        string $initialState,
        array $finalStates,
        array $transition
    ): string {
        // pre-flight check - we need to make sure that initial state supported
        if (!in_array($initialState, $availableStates)) {
            throw new UnsupportedStateException('Unsupported initial state: ' . $initialState);
        }

        // step 1. set currentState from initialState
        $currentState = $initialState;

        // main loop - let's iterate alphabet
        for ($i = 0; $i < strlen($alphabet); $i++) {
            $resultingState = null;
            // let's check transition mapping
            if(!empty($transition[$currentState][$alphabet[$i]])) {
                $resultingState = $transition[$currentState][$alphabet[$i]];
            }
            if ($resultingState == null) {
                throw new UnsupportedStateException('Transition function returned empty value');
            }
            if (!in_array($initialState, $availableStates)) {
                throw new UnsupportedStateException('Unsupported resulting state: ' . $resultingState);
            }
            $currentState = $resultingState;
        }

        // need to verify our final state expected and supported
        if (!in_array($currentState, $finalStates)) {
            throw new UnsupportedStateException('Unsupported final state: ' . $initialState);
        }

        // returning a new instance
        return $currentState;
    }
}
