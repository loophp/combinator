<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class M.
 *
 * @psalm-template ResultType
 */
final class M extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * M constructor.
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
        return ($this->f)($this->f);
    }
}
