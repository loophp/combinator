<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class HSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f3 = static function ($x) {
            return static function ($y) use ($x) {
                return static function ($z) use ($x, $y): string {
                    return sprintf('%s(%s)(%s)(%s)', 'a', $x, $y, $z);
                };
            };
        };

        $this::of()($f3)('b')('c')
            ->shouldReturn('a(b)(c)(b)');
    }
}
