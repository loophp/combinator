<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Omega.
 *
 * @psalm-template ResultType
 */
final class Omega extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * Omega constructor.
     *
     * @psalm-param callable $f
     *
     * @param callable $f
     */
    public function __construct(callable $f)
    {
        $this->f = $f;
    }

    /**
     * @psalm-return ResultType
     */
    public function __invoke()
    {
        return ($this->f)($this->f)(($this->f)($this->f));
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a)
    {
        return (new self($a))();
    }
}
