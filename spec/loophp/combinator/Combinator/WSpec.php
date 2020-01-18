<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class WSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function () use ($x) {
                return $x + 1;
            };
        };

        $arguments = [$f, 10];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(11);

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn(11);
    }
}
