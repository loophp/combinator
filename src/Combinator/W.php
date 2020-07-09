<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class W.
 *
 * @template AType
 * @template BType
 */
final class W extends Combinator
{
    /**
     * @var callable(AType): callable(AType): BType
     */
    private $f;

    /**
     * @var AType
     */
    private $x;

    /**
     * W constructor.
     *
     * @param callable(AType): (callable(AType): (BType)) $f
     * @param AType $x
     */
    public function __construct(callable $f, $x)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @return BType
     */
    public function __invoke()
    {
        return ($this->f)($this->x)($this->x);
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @param callable(NewAType):(callable(NewAType):(NewBType)) $f
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return NewBType
             */
            static function ($x) use ($f) {
                return (new self($f, $x))();
            };
    }
}
