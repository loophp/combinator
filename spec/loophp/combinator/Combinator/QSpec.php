<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

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
            ->__invoke()
            ->shouldReturn('g(f(a))');
    }
}
