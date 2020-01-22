<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class RSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x = null) {
            return static function ($y) use ($x) {
                return 'f(' . $x . ')(' . $y . ')';
            };
        };

        $arguments = ['x', $f, 'y'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('f(y)(x)');

        $this
            ->__invoke()
            ->shouldReturn('f(y)(x)');
    }
}
