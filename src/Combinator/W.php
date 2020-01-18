<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class W.
 */
final class W extends Combinator
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
     * W constructor.
     *
     * @param callable $f
     * @param mixed $x
     */
    public function __construct(callable $f, $x)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)($this->x)($this->x);
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, $x) {
            return (new self($f, $x))();
        };
    }
}
