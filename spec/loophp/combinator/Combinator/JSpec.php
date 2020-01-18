<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class JSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($a) use ($x) {
                return $x + $a;
            };
        };

        $arguments = [$f, 1, 2, 3];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(6);

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn(6);
    }
}
