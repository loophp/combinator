<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class JSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (string $x) {
            return static function (string $y) use ($x): string {
                return 'a(' . $x . ')(' . $y . ')';
            };
        };

        $this::of()($f2)('b')('c')('d')
            ->shouldReturn('a(b)(a(d)(c))');
    }
}
