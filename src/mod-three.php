<?php

use FSM\UnsupportedStateException;
use ModThree\BinaryStringObject;

/**
 * @throws UnsupportedStateException
 */
function modThree(string $input): int
{
    return (new BinaryStringObject($input))->mod3();
}
