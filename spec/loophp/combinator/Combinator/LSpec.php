<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class LSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (callable $g) {
            return $g() ** 2;
        };

        $g = static function (?callable $x = null) {
            if (null === $x) {
                return 3;
            }

            return static function () use ($x) {
                return $x() * 2;
            };
        };

        $arguments = [$f, $g];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(36);

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn(36);
    }
}
