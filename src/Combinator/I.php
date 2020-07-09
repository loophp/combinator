<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class I.
 *
 * @template AType
 */
final class I extends Combinator
{
    /**
     * @var AType
     */
    private $x;

    /**
     * I constructor.
     *
     * @param AType $x
     */
    public function __construct($x)
    {
        $this->x = $x;
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
     *
     * @param NewAType $x
     *
     * @return NewAType
     */
    public static function on($x)
    {
        return (new self($x))();
    }
}
