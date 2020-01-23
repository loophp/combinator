<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class RSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'b', $x, $y);
            };
        };

        $arguments = ['a', $f, 'c'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('b(c)(a)');

        $this
            ->__invoke()
            ->shouldReturn('b(c)(a)');
    }
}
