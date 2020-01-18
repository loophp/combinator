<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class T.
 */
final class T extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * @var mixed
     */
    private $x;

    /**
     * T constructor.
     *
     * @param callable $f
     * @param mixed $x
     */
    public function __construct($x, callable $f)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)($this->x);
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function ($x, callable $f) {
            return (new self($x, $f))();
        };
    }
}
