<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class M.
 */
final class M extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * M constructor.
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
     * @return mixed
     */
    public static function on(callable $a)
    {
        return (new self($a))();
    }
}
