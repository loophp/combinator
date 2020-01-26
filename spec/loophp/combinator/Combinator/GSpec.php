<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class GSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $a);
            };
        };

        $g = static function (string $x) {
            return sprintf('%s(%s)', 'b', $x);
        };

        $arguments = [$f2, $g, 'c', 'd'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(d)(b(c))');

        $this
            ->__invoke()
            ->shouldReturn('a(d)(b(c))');

        $this::on($f2)($g)('c')('d')
            ->shouldReturn('a(d)(b(c))');
    }
}
