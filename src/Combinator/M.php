<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class M extends Combinator
{
    public function __invoke(): Closure
    {
        return
            /**
             * @return mixed
             */
            static function (callable $f) {
                return ($f)($f);
            };
    }
}
