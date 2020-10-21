<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class Omega extends Combinator
{
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(callable): callable(callable): callable $f
             *
             * @return mixed
             */
            static function (callable $f) {
                return ($f)($f)(($f)($f));
            };
    }
}
