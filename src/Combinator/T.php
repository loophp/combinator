<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class T.
 *
 * @psalm-template AType
 * @psalm-template BType
 */
final class T extends Combinator
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
     * T constructor.
     *
     * @psalm-param AType $x
     * @psalm-param callable(AType): BType $f
     *
     * @param mixed $x
     * @param callable $f
     */
    public function __construct($x, callable $f)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->f)($this->x);
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on($a): Closure
    {
        return static function (callable $b) use ($a) {
            return (new self($a, $b))();
        };
    }
}
