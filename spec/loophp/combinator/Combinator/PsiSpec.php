<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class PsiSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($a) {
            return static function ($b) use ($a) {
                return $a * $b;
            };
        };

        $g = static function ($a) {
            return $a - 1;
        };

        $arguments = [$f, $g, 22, 3];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(42);

        $this
            ->__invoke()
            ->shouldReturn(42);
    }
}
