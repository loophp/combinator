<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class VSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'c', $x, $y);
            };
        };

        $this::of()('a')('b')($f)
            ->shouldReturn('c(a)(b)');
    }
}
