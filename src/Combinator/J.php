<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class J.
 *
 * @psalm-template AType
 * @psalm-template BType
 */
final class J extends Combinator
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
     * @var mixed
     */
    private $y;

    /**
     * @var mixed
     */
    private $z;

    /**
     * J constructor.
     *
     * @psalm-param callable(AType): callable(BType): BType $f
     * @psalm-param AType $x
     * @psalm-param BType $y
     * @psalm-param AType $z
     *
     * @param callable $f
     * @param mixed $x
     * @param mixed $y
     * @param mixed $z
     */
    public function __construct(callable $f, $x, $y, $z)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return (($this->f)($this->x))((($this->f)($this->z))($this->y));
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function ($b) use ($a): Closure {
            return static function ($c) use ($a, $b): Closure {
                return static function ($d) use ($a, $b, $c) {
                    return (new self($a, $b, $c, $d))();
                };
            };
        };
    }
}
