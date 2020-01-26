<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class JSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (string $x) {
            return static function (string $y) use ($x): string {
                return 'a(' . $x . ')(' . $y . ')';
            };
        };

        $arguments = [$f2, 'b', 'c', 'd'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(b)(a(d)(c))');

        $this
            ->__invoke()
            ->shouldReturn('a(b)(a(d)(c))');

        $this::on($f2)('b')('c')('d')
            ->shouldReturn('a(b)(a(d)(c))');
    }
}
