<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class T.
 *
 * @template AType
 * @template BType
 */
final class T extends Combinator
{
    /**
     * @var callable(AType): BType
     */
    private $f;

    /**
     * @var AType
     */
    private $x;

    /**
     * T constructor.
     *
     * @param AType $x
     * @param callable(AType): BType $f
     */
    public function __construct($x, callable $f)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @return BType
     */
    public function __invoke()
    {
        return ($this->f)($this->x);
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @param NewAType $x
     */
    public static function on($x): Closure
    {
        return
            /**
             * @param callable(NewAType): NewBType $f
             *
             * @return NewBType
             */
            static function (callable $f) use ($x) {
                return (new self($x, $f))();
            };
    }
}
