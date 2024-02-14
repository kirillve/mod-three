<?php

namespace ModThree;

interface EvaluatorInterface
{
    public function evaluate(string $input): int;
}
