<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class Z extends Combinator
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
            static function (callable $callable): Closure {
                return M::of()(
                    static function (callable $f) use ($callable): Closure {
                        return $callable(
                            static function () use ($f) {
                                return static function (...$arguments) use ($f) {
                                    return M::of()($f)(...$arguments);
                                };
                            }
                        );
                    }
                );
            };
    }
}
