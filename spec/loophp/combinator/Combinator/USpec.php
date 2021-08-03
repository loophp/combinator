<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class USpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (?callable $x = null) {
            if (null === $x) {
                return static function () {
                    return 'b';
                };
            }

            return static function ($y) use ($x) {
                if (null === $x()) {
                    return 'a()';
                }

                return sprintf('%s(%s)(%s)', 'a', 'a', $x()());
            };
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::of()($f2)($g)
            ->shouldReturn('b(a(a)(b))');
    }
}
