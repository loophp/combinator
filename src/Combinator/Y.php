<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Y.
 *
 * @psalm-template ResultType
 */
final class Y extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * Y constructor.
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
     * @psalm-return Closure(Closure(callable): mixed): mixed
     */
    public function __invoke()
    {
        $callable = $this->f;

        /**
         * @psalm-suppress MissingClosureReturnType
         *
         * @param callable $f
         *
         * @return mixed
         */
        $f = static function (callable $f) use ($callable) {
            return $callable(
                /**
                 * @psalm-suppress MissingClosureParamType
                 *
                 * @param array $arguments
                 */
                static function (...$arguments) use ($f) {
                    return $f($f)(...$arguments);
                }
            );
        };

        return $f($f);
    }
}
