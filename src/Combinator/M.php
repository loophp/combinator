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
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f) {
            return (new self($f))();
        };
    }
}
