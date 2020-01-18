<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class USpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (?callable $g = null) {
            if (null === $g) {
                return static function () {
                    return 'g';
                };
            }

            return static function ($x) use ($g) {
                if (null === $g) {
                    return 'f()';
                }

                return 'f(f)(' . $g() . ')';
            };
        };

        $g = static function (?string $g = null) {
            return 'g(' . $g . ')';
        };

        $arguments = [$f, $g];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('g(f(f)(g))');

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('g(f(f)(g))');
    }
}
