<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class FSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($a) use ($x) {
                return sqrt($x) + $a;
            };
        };

        $arguments = [5, 16, $f];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn((float) 9);

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn((float) 9);
    }
}
