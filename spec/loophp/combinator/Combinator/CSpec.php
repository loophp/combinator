<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class CSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($y) use ($x) {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $arguments = [$f, 'b', 'c'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(c)(b)');

        $this
            ->__invoke()
            ->shouldReturn('a(c)(b)');
    }
}
