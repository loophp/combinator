<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class K.
 *
 * @template AType
 * @template BType
 */
final class K extends Combinator
{
    /**
     * @var AType
     */
    private $x;

    /**
     * @var BType
     */
    private $y;

    /**
     * K constructor.
     *
     * @param AType $x
     * @param BType $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return AType
     */
    public function __invoke()
    {
        return $this->x;
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @param NewAType $x
     *
     * @return Closure(NewBType): NewAType
     */
    public static function on($x): Closure
    {
        return
            /**
             * @param NewBType $y
             */
            static function ($y) use ($x) {
                return (new self($x, $y))();
            };
    }
}
