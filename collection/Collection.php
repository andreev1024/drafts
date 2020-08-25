<?php

declare(strict_types=1);

namespace EHR\AppBundle\Collection;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

/**
 * @template TValue
 *
 * @template-implements IteratorAggregate<int, TValue>
 * @psalm-immutable
 */
abstract class Collection implements IteratorAggregate, Countable
{
    /** @psalm-var array<int, TValue>  */
    private array $elements;

    /**
     * @psalm-param array<int, TValue> $elements
     */
    public function __construct(array $elements)
    {
        $typeValidator = new TypeValidator();
        foreach ($elements as $key => $element) {
            $typeValidator->checkType($element, $this->getType());
            if (!is_int($key)) {
                throw new TypeException('Collection key should be int');
            }
        }
        $this->elements = $elements;
    }

    /**
     * @psalm-return Traversable<int, TValue>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->elements);
    }

    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * @psalm-return array<int, TValue>
     */
    public function toArray(): array
    {
        return $this->elements;
    }

    abstract protected function getType(): string;
}
