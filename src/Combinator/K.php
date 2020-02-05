<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class K.
 *
 * @psalm-template AType
 * @psalm-template BType
 *
 * @psalm-immutable
 */
final class K extends Combinator
{
    /**
     * @psalm-var AType
     *
     * @var mixed
     */
    private $x;

    /**
     * @psalm-var BType
     *
     * @var mixed
     */
    private $y;

    /**
     * K constructor.
     *
     * @psalm-param AType $x
     * @psalm-param BType $y
     *
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @psalm-return AType
     *
     * @return mixed
     */
    public function __invoke()
    {
        return $this->x;
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @psalm-param NewAType $x
     *
     * @param mixed $x
     *
     * @return Closure(NewBType): NewAType
     */
    public static function on($x): Closure
    {
        return
            /** @param NewBType $y */
            static function ($y) use ($x) {
                return (new self($x, $y))();
            };
    }
}
