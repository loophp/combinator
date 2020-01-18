<?php

declare(strict_types=1);

namespace loophp\combinator\Contract;

/**
 * Interface Closureable.
 */
interface Closureable
{
    /**
     * @return callable
     */
    public static function closure(): callable;
}
