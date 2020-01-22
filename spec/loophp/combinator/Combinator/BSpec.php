<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class BSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $add7 = static function ($a) {
            return $a + 7;
        };

        $multiplyBy2 = static function ($a) {
            return $a * 2;
        };

        $arguments = [$add7, $multiplyBy2, 5];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn(17);

        $this
            ->__invoke()
            ->shouldReturn(17);
    }
}
