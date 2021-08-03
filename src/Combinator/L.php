<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class L extends Combinator
{
    /**
     * @psalm-suppress MissingClosureReturnType
     */
    public function __invoke(): Closure
    {
        return static fn (callable $f): Closure => static fn (callable $g): mixed => ($f)(($g)($g));
    }
}
