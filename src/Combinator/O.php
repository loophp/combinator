<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class O.
 *
 * @psalm-template AType
 * @psalm-template BType
 *
 * @psalm-immutable
 */
final class O extends Combinator
{
    /**
     * @psalm-var callable(callable(AType): BType): AType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var callable(AType): BType
     *
     * @var callable
     */
    private $g;

    /**
     * O constructor.
     *
     * @psalm-param callable(callable(AType): BType): AType $f
     * @psalm-param callable(AType): BType $g
     *
     * @param callable(callable(AType): BType): AType $f
     * @param callable(AType): BType $g
     */
    public function __construct(callable $f, callable $g)
    {
        $this->f = $f;
        $this->g = $g;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->g)((($this->f)($this->g)));
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @psalm-param callable(callable(NewAType): NewBType): NewAType $f
     *
     * @param callable $f
     *
     * @psalm-return Closure(callable(NewAType): NewBType): NewBType
     *
     * @return Closure
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param callable(NewAType): NewBType $g */
            static function (callable $g) use ($f) {
                return (new self($f, $g))();
            };
    }
}
