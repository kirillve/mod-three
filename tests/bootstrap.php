<?php

use ModThree\ModThreeException;

$rootPath = dirname(__DIR__, 1);
require($rootPath . '/vendor/autoload.php');

set_error_handler('deprecationErrorHandler', E_DEPRECATED | E_USER_DEPRECATED);

/**
 * @throws ModThreeException
 */
function deprecationErrorHandler(mixed $errno, mixed $errstr, mixed $errfile, mixed $errline): false
{
    if ($errno === E_DEPRECATED || $errno === E_USER_DEPRECATED) {
        throw new ModThreeException("Deprecation notice: $errstr in $errfile on line $errline");
    }

    return false;

}
