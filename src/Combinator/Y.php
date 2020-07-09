<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Y.
 */
final class Y extends Combinator
{
    /**
     * @psalm-var callable(callable): Closure
     *
     * @var callable
     */
    private $f;

    /**
     * Y constructor.
     *
     * @psalm-param callable(callable): Closure $f
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
                    static function (...$arguments) use ($f) {
                        return M::with()($f)(...$arguments);
                    }
                );
            }
        );
    }

    /**
     * @psalm-suppress MissingClosureReturnType
     * @psalm-suppress MissingClosureParamType
     * @psalm-suppress MixedArgumentTypeCoercion
     */
    public static function on(callable $a): Closure
    {
        return (new self($a))();
    }
}
