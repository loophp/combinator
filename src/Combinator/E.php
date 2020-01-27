<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class E.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 * @psalm-template EType
 */
final class E extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * @var callable
     */
    private $g;

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
     * E constructor.
     *
     * @psalm-param callable(AType): callable(DType): EType $f
     * @psalm-param AType $x
     * @psalm-param callable(BType): callable(CType): DType $g
     * @psalm-param BType $y
     * @psalm-param CType $z
     *
     * @param callable $f
     * @param mixed $x
     * @param callable $g
     * @param mixed $y
     * @param mixed $z
     */
    public function __construct(callable $f, $x, callable $g, $y, $z)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @psalm-return EType
     */
    public function __invoke()
    {
        // Demander à Danny :-)
        // const E = a => b => c => d => e => a(b)(c(d)(e))
        return (($this->f)($this->x))((($this->g)($this->y))($this->z));
    }
}
