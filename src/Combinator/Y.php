<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class Y extends Combinator
{
    /**
     * @psalm-suppress MixedInferredReturnType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @psalm-suppress MissingClosureReturnType
             * @psalm-suppress MissingClosureParamType
             * @psalm-suppress MixedArgumentTypeCoercion
             * @psalm-suppress ImpureMethodCall
             * @psalm-suppress MixedFunctionCall
             * @psalm-suppress MixedReturnStatement
             */
            static function (callable $f): Closure {
                return
                    M::of()(
                        static function (callable $loop) use ($f): Closure {
                            return $f(
                                static function (...$arguments) use ($loop) {
                                    return M::of()($loop)(...$arguments);
                                }
                            );
                        }
                    );
            };
    }
}
