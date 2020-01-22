<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class Y.
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
     * @param callable $f
     */
    public function __construct(callable $f)
    {
        $this->f = $f;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $callable = $this->f;

        $f = static function (callable $f) use ($callable): callable {
            return $callable(
                static function (...$arguments) use ($f) {
                    return $f($f)(...$arguments);
                }
            );
        };

        return $f($f);
    }
}
