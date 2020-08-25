<?php

declare(strict_types=1);

namespace EHR\AppBundle\Collection;

//todo unit test

/**
 * @psalm-immutable
 */
class TypeValidator
{
    public const TYPE_STRING = 'string';

    public function checkType($element, string $type): void
    {
        if (($type === self::TYPE_STRING && is_string($element))
            || (is_object($element) && $element instanceof $type)
        ) {
            return;
        }
        throw new TypeException('invalid type');
    }
}
