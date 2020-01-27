<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Z.
 *
 * @psalm-template ResultType
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
     * @psalm-return Closure(Closure(callable): mixed): mixed
     */
    public function __invoke()
    {
        $callable = $this->f;

        $f = static function (callable $f) use ($callable): Closure {
            return $callable(
                static function () use ($f) {
                    return static function (...$arguments) use ($f) {
                        return M::with()($f)(...$arguments);
                    };
                }
            );
        };

        return M::with()($f);
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return (new self($a))();
    }
}
