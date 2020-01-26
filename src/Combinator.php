<?php

declare(strict_types=1);

namespace loophp\combinator;

use Closure;
use InvalidArgumentException;

use function get_called_class;
use function is_callable;

/**
 * Class Combinator.
 */
abstract class Combinator implements \loophp\combinator\Contract\Combinator
{
    /**
     * @return Closure
     */
    public static function with(): Closure
    {
        $possibleCallable = ['static', 'on'];

        if (true === is_callable($possibleCallable)) {
            return Closure::fromCallable($possibleCallable);
        }

        throw new InvalidArgumentException('Implement on() method in ' . get_called_class() . '.');
    }
}
