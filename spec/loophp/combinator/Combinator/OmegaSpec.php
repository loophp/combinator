<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class OmegaSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x = null) {
            $out = 'a(';

            return static function () use ($out) {
                $out .= 'a)(a(a))';

                return $out;
            };
        };

        $this::of()($f)
            ->shouldReturn('a(a)(a(a))');
    }
}
