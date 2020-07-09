<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class L.
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
     */
    public static function on(callable $a): Closure
    {
        return static function (callable $b) use ($a) {
            return (new self($a, $b))();
        };
    }
}
