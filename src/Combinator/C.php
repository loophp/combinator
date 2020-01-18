<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class C.
 */
final class C extends Combinator
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
     * @var mixed
     */
    private $y;

    /**
     * C constructor.
     *
     * @param callable $f
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, $x, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)($this->y)($this->x);
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, $x, $y) {
            return (new self($f, $x, $y))();
        };
    }
}
