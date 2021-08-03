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
             * @psalm-suppress UnusedClosureParam
             */
            static fn (callable $callable): Closure =>
                M::of()(
                    static fn (callable $f): Closure =>
                        $callable(
                            static fn (): Closure => static fn (...$arguments): Closure => M::of()($f)(...$arguments)
                        )
                );
    }
}
