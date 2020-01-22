<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class HSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($y) use ($x) {
                return static function ($a) use ($y, $x) {
                    return $x + $a + $y;
                };
            };
        };

        $arguments = [$f, 4, 9];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(17);

        $this
            ->__invoke()
            ->shouldReturn(17);
    }
}
