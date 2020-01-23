<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class FSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'c', $x, $a);
            };
        };

        $arguments = ['a', 'b', $f2];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('c(b)(a)');

        $this
            ->__invoke()
            ->shouldReturn('c(b)(a)');
    }
}
