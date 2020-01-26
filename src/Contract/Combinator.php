<?php

declare(strict_types=1);

namespace loophp\combinator\Contract;

use Closure;

/**
 * Interface Combinator.
 */
interface Combinator
{
    /**
     * @return Closure
     */
    public static function with(): Closure;
}
