<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class Omega.
 */
final class Omega extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * Omega constructor.
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
     * @return mixed
     */
    public static function on(callable $f)
    {
        return (new self($f))();
    }
}
