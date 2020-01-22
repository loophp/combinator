<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class ESpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($a) use ($x) {
                return sqrt($x) + $a;
            };
        };

        $g = static function ($x) {
            return static function ($a) use ($x) {
                return $x + $a;
            };
        };

        $arguments = [$f, 9, $g, 4, 3];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn((float) 10);

        $this
            ->__invoke()
            ->shouldReturn((float) 10);
    }
}
