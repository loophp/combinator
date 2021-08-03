<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class DSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (string $x) {
            return static function (callable $a) use ($x) {
                return 'a(' . $x . ')(' . $a('d') . ')';
            };
        };

        $g2 = static function (string $x) {
            return static function ($a) use ($x): string {
                return 'c(' . $x . ')';
            };
        };

        $this::of()($f2)('b')($g2)('d')
            ->shouldReturn('a(b)(c(d))');
    }
}
