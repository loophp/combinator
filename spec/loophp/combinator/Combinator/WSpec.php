<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class WSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $arguments = [$f, 'b'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(b)(b)');

        $this
            ->__invoke()
            ->shouldReturn('a(b)(b)');
    }
}
