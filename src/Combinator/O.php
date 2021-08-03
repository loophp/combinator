<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class O.
 *
 * @template NewAType
 * @template NewBType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class O extends Combinator
{
    /**
     * @return Closure(callable(callable(NewAType): NewBType): NewAType): Closure(callable(NewAType): (NewBType)): (NewBType)
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(callable(NewAType): NewBType): NewAType $f
             *
             * @return Closure(callable(NewAType): NewBType): NewBType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewAType): NewBType $g
                 *
                 * @return NewBType
                 */
                static fn (callable $g): mixed => ($g)((($f)($g)));
    }
}
