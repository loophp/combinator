<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class QSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (string $x) {
            return sprintf('%s(%s)', 'a', $x);
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $arguments = [$f, $g, 'c'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('b(a(c))');

        $this
            ->__invoke()
            ->shouldReturn('b(a(c))');
    }
}
