<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class PsiSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x, $y) {
            return $x + $y;
        };

        $g = static function ($a) {
            return $a * $a;
        };

        $arguments = [$f, $g, 8, 2];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(68);

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn(68);
    }
}
