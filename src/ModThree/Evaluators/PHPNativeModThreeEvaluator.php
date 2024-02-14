<?php

namespace ModThree\Evaluators;

use ModThree\EvaluatorInterface;

class PHPNativeModThreeEvaluator implements EvaluatorInterface
{
    #[\Override]
    public function evaluate(string $input): int
    {
        return bindec($input) % 3;
    }
}
