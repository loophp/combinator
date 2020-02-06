<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class L.
 *
 * @psalm-immutable
 */
final class L extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * @var callable
     */
    private $g;

    /**
     * L constructor.
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
        return ($this->f)(($this->g)($this->g));
    }

    /**
     * @psalm-suppress MissingClosureReturnType
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
