<?php

namespace FSM;

class FSM
{
    public function __construct(private readonly OutputHandlerInterface $outputHandler)
    {
    }

    /**
     * @throws UnsupportedStateException
     *
     * @return string
     */
    public function evaluate(
        FiveTuplesRequestInterface $request
    ): string {
        // pre-flight check - we need to make sure that initial state supported
        if (!in_array($request->getInitialState(), $request->getAvailableStates())) {
            throw new UnsupportedStateException('Unsupported initial state: ' . $request->getInitialState());
        }

        // step 1. set currentState from initialState
        $currentState = $request->getInitialState();

        // main loop - let's iterate alphabet
        for ($i = 0; $i < strlen($request->getAlphabet()); $i++) {
            // let's check transition mapping
            if (empty($request->getTransition()[$currentState]) || empty($request->getTransition()[$currentState][$request->getAlphabet()[$i]])) {
                throw new UnsupportedStateException('Empty Transition State: current state - '.$currentState. ' alphabet key - '.$request->getAlphabet()[$i]);
            }
            $currentState = $request->getTransition()[$currentState][$request->getAlphabet()[$i]];
            if ($currentState == null) {
                throw new UnsupportedStateException('Transition function returned empty value');
            }
            if (!in_array($currentState, $request->getAvailableStates())) {
                throw new UnsupportedStateException('Unsupported resulting state: ' . $currentState);
            }
        }

        // need to verify our final state expected and supported
        if (!in_array($currentState, $request->getFinalStates())) {
            throw new UnsupportedStateException('Unsupported final state: ' . $currentState);
        }

        // returning a new instance
        return $this->outputHandler->handleOutput($currentState);
    }
}
