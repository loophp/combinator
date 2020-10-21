<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class U extends Combinator
{
    /**
     * @suppress MissingClosureReturnType
     * @suppress MissingClosureParamType
     * @suppress MixedArgumentTypeCoercion
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(callable): callable $f
             *
             * @return Closure(callable): mixed
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @return mixed
                     */
                    static function (callable $g) use ($f) {
                        return $g(($f($f))($g));
                    };
            };
    }
}
