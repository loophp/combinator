<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class S.
 */
final class S extends Combinator
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
     * S constructor.
     *
     * @param callable $f
     * @param callable $g
     * @param mixed $x
     */
    public function __construct(callable $f, callable $g, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)($this->x)(($this->g)($this->x));
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, callable $g, $x) {
            return (new self($f, $g, $x))();
        };
    }
}
