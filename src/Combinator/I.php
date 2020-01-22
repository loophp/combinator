<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class I.
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
     * @param mixed $x
     */
    public function __construct($x)
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return $this->x;
    }
}
