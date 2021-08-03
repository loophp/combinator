<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class MSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (?callable $x = null) {
            if (null === $x) {
                return 'a';
            }

            return sprintf('%s(%s)', 'a', $x());
        };

        $this::of()($f)
            ->shouldReturn('a(a)');
    }
}
