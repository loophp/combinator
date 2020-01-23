<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class TSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $arguments = ['a', $f];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('b(a)');

        $this
            ->__invoke()
            ->shouldReturn('b(a)');
    }
}
