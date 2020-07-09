<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class O.
 *
 * @template AType
 * @template BType
 */
final class O extends Combinator
{
    /**
     * @var callable(callable(AType): BType): AType
     */
    private $f;

    /**
     * @var callable(AType): BType
     */
    private $g;

    /**
     * O constructor.
     *
     * @param callable(callable(AType): (BType)): (AType) $f
     * @param callable(AType): (BType) $g
     */
    public function __construct(callable $f, callable $g)
    {
        $this->f = $f;
        $this->g = $g;
    }

    /**
     * @return BType
     */
    public function __invoke()
    {
        return ($this->g)((($this->f)($this->g)));
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @param callable(callable(NewAType): (NewBType)): (NewAType) $f
     *
     * @return Closure(callable(NewAType): (NewBType)): (NewBType)
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param callable(NewAType): (NewBType) $g
             *
             * @return NewBType
             */
            static function (callable $g) use ($f) {
                return (new self($f, $g))();
            };
    }
}
