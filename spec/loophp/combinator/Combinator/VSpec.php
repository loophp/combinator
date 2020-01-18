<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class VSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($y) use ($x) {
                return 'f(' . $x . ')(' . $y . ')';
            };
        };

        $arguments = ['x', 'y', $f];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('f(x)(y)');

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('f(x)(y)');
    }
}
