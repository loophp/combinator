<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class I.
 *
 * @psalm-template AType
 *
 * @psalm-immutable
 */
final class I extends Combinator
{
    /**
     * @psalm-var AType
     *
     * @var mixed
     */
    private $x;

    /**
     * I constructor.
     *
     * @psalm-param AType $x
     *
     * @param mixed $x
     */
    public function __construct($x)
    {
        $this->x = $x;
    }

    /**
     * @psalm-return AType
     */
    public function __invoke()
    {
        return $this->x;
    }

    /**
     * @template NewAType
     *
     * @psalm-param NewAType $x
     *
     * @param mixed $x
     *
     * @return NewAType
     */
    public static function on($x)
    {
        return (new self($x))();
    }
}
