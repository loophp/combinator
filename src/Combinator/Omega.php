<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Omega.
 *
 * @psalm-immutable
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
     * @param callable $f
     */
    public function __construct(callable $f)
    {
        $this->f = $f;
    }

    /**
     * @psalm-return mixed
     *
     * @return mixed
     *
     * @psalm-suppress MixedFunctionCall
     */
    public function __invoke()
    {
        return ($this->f)($this->f)(($this->f)($this->f));
    }

    /**
     * @param callable $f
     *
     * @return mixed
     */
    public static function on(callable $f)
    {
        return (new self($f))();
    }
}
