<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class U.
 *
 * @psalm-immutable
 */
final class U extends Combinator
{
    /**
     * @psalm-var callable(callable): callable
     *
     * @var callable
     */
    private $f;

    /**
     * @var callable
     */
    private $g;

    /**
     * U constructor.
     *
     * @psalm-param callable(callable): callable $f
     *
     * @param callable $f
     * @param callable $g
     */
    public function __construct(callable $f, callable $g)
    {
        $this->f = $f;
        $this->g = $g;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $f = $this->f;
        $g = $this->g;

        return $g(($f($f))($g));
    }

    /**
     * @psalm-suppress MissingClosureReturnType
     * @psalm-suppress MissingClosureParamType
     * @psalm-suppress MixedArgumentTypeCoercion
     *
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function (callable $b) use ($a) {
            return (new self($a, $b))();
        };
    }
}
