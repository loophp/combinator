<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class ESpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $a);
            };
        };

        $g2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'c', $x, $a);
            };
        };

        $arguments = [$f2, 'b', $g2, 'd', 'e'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(b)(c(d)(e))');

        $this
            ->__invoke()
            ->shouldReturn('a(b)(c(d)(e))');
    }
}
