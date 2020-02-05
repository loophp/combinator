<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class M.
 *
 * @psalm-immutable
 */
final class M extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * M constructor.
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
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)($this->f);
    }

    /**
     * @param callable $a
     *
     * @return mixed
     */
    public static function on(callable $a)
    {
        return (new self($a))();
    }
}
