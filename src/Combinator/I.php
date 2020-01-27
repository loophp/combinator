<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class I.
 *
 * @psalm-template AType
 */
final class I extends Combinator
{
    /**
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
}
