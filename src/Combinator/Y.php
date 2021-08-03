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
             * @psalm-suppress UnusedClosureParam
             */
            static fn (callable $f): Closure =>
                M::of()(
                    static fn (callable $loop): Closure =>
                        $f(
                            static fn (...$arguments): mixed => M::of()($loop)(...$arguments)
                        )
                );
    }
}
