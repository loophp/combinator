<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class GSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($a) use ($x) {
                return sqrt($x) + $a;
            };
        };

        $g = static function ($x) {
            return sqrt($x) + $x;
        };

        $arguments = [$f, $g, 4, 9];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn((float) 9);

        $this
            ->__invoke()
            ->shouldReturn((float) 9);
    }
}
