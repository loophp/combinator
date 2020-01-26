<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class W.
 *
 * @psalm-template AType
 * @psalm-template BType
 */
final class W extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * @var mixed
     */
    private $x;

    /**
     * W constructor.
     *
     * @psalm-param callable(AType): callable(AType): BType $f
     * @psalm-param AType $x
     *
     * @param callable $f
     * @param mixed $x
     */
    public function __construct(callable $f, $x)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->f)($this->x)($this->x);
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function ($b) use ($a) {
            return (new self($a, $b))();
        };
    }
}
