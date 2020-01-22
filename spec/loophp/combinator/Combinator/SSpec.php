<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class SSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($y) use ($x) {
                return $x + $y;
            };
        };

        $g = static function ($a) {
            return $a;
        };

        $arguments = [$f, $g, 2];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(4);

        $this
            ->__invoke()
            ->shouldReturn(4);
    }
}
