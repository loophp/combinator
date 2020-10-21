<?php

declare(strict_types=1);

namespace loophp\combinator\Contract;

use Closure;

interface Combinator
{
    public static function of(): Closure;
}
