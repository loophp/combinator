<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class TSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::of()('a')($f)
            ->shouldReturn('b(a)');
    }
}
