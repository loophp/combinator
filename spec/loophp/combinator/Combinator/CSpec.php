<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class CSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($y) use ($x) {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $this::of()($f)('b')('c')
            ->shouldReturn('a(c)(b)');
    }
}
