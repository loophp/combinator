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
 *
 * @psalm-immutable
 */
final class T extends Combinator
{
    /**
     * @psalm-var callable(AType): BType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var AType
     *
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
     * @template NewAType
     * @template NewBType
     *
     * @psalm-param NewAType $x
     *
     * @param mixed $x
     *
     * @psalm-return Closure(callable(NewAType): NewBType): NewBType
     *
     * @return Closure
     */
    public static function on($x): Closure
    {
        return
            /** @psalm-param callable(NewAType): NewBType $f */
            static function (callable $f) use ($x) {
            return (new self($x, $f))();
        };
    }
}
