<?php

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

        $arguments = [$f3, 'b', 'c'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(b)(c)(b)');

        $this
            ->__invoke()
            ->shouldReturn('a(b)(c)(b)');

        $this::on($f3)('b')('c')
            ->shouldReturn('a(b)(c)(b)');
    }
}
