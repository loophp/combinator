<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator;

use Closure;
use loophp\combinator\Contract\Combinator as CombinatorInterface;

abstract class Combinator implements CombinatorInterface
{
    final public function __construct()
    {
    }

    abstract public function __invoke(): Closure;

    public static function of(): Closure
    {
        return (new static())->__invoke();
    }
}
