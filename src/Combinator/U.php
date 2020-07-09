<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class U.
 */
final class U extends Combinator
{
    /**
     * @var callable(callable): callable
     */
    private $f;

    /**
     * @var callable
     */
    private $g;

    /**
     * U constructor.
     *
     * @param callable(callable): callable $f
     */
    public function __construct(callable $f, callable $g)
    {
        $this->f = $f;
        $this->g = $g;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $f = $this->f;
        $g = $this->g;

        return $g(($f($f))($g));
    }

    /**
     * @suppress MissingClosureReturnType
     * @suppress MissingClosureParamType
     * @suppress MixedArgumentTypeCoercion
     *
     * @param callable(callable): callable $f
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @return mixed
             */
            static function (callable $g) use ($f) {
                return (new self($f, $g))();
            };
    }
}
