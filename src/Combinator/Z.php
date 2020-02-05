<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Z.
 *
 * @psalm-immutable
 */
final class Z extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * Z constructor.
     *
     * @psalm-param callable $f
     *
     * @param callable $f
     */
    public function __construct(callable $f)
    {
        $this->f = $f;
    }

    /**
     * @psalm-suppress MixedInferredReturnType
     *
     * @return Closure
     */
    public function __invoke()
    {
        $callable = $this->f;

        /**
         * @psalm-suppress MissingClosureReturnType
         * @psalm-suppress MissingClosureParamType
         * @psalm-suppress MixedArgumentTypeCoercion
         * @psalm-suppress ImpureMethodCall
         * @psalm-suppress MixedFunctionCall
         * @psalm-suppress MixedReturnStatement
         */
        return M::with()(
            static function (callable $f) use ($callable): Closure {
                return $callable(
                    static function () use ($f) {
                        return static function (...$arguments) use ($f) {
                            return M::with()($f)(...$arguments);
                        };
                    }
                );
            }
        );
    }

    /**
     * @psalm-suppress MissingClosureReturnType
     * @psalm-suppress MissingClosureParamType
     * @psalm-suppress MixedArgumentTypeCoercion
     *
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return (new self($a))();
    }
}
