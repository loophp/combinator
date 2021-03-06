<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class CSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function ($y) use ($x) {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $this::of()($f)('b')('c')
            ->shouldReturn('a(c)(b)');
    }
}
