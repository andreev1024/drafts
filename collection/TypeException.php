<?php

declare(strict_types=1);

namespace EHR\AppBundle\Collection;

use Exception;

// Use it instead TypeError.
// Reason: there some issues with PhpUnit/Infection (TypeError isn't exception. It is an Error)
class TypeException extends Exception
{
}
