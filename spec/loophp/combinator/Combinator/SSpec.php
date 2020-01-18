<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class SSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $g = static function ($a) {
            return $a * 2;
        };

        $f = static function ($x) {
            return static function ($a) use ($x) {
                return sqrt($x) + $a;
            };
        };

        $arguments = [$f, $g, 9];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn((float) 21);

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn((float) 21);
    }
}
