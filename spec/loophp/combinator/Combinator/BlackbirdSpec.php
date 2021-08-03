<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class BlackbirdSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $a = 'array_sum';

        $b = static fn (callable $c): Closure => static fn (array $v): array => array_map($c, $v);

        $c = 'count';

        $this::of()($a)($b)($c)([['a', 'b', 'c'], ['a', 'b']])
            ->shouldReturn(5);
    }
}
