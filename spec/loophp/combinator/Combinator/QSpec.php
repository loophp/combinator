<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class QSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x = null) {
            if (null === $x) {
                return 'f()';
            }

            return 'f(' . $x . ')';
        };

        $g = static function (?string $v = null) {
            return 'g(' . $v . ')';
        };

        $arguments = [$f, $g, 'a'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('g(f(a))');

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('g(f(a))');
    }
}
