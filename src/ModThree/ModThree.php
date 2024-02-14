<?php

namespace ModThree;

class ModThree
{
    public function __construct(private readonly EvaluatorInterface $evaluator)
    {
    }

    public function evaluate(string $input): int
    {
        return $this->evaluator->evaluate($input);
    }
}
