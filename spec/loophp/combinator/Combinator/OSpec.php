<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class OSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (?callable $x = null) {
            if (null === $x) {
                return 'f()';
            }

            return 'f(' . $x() . ')';
        };

        $g = static function (?string $v = null) {
            return 'g(' . $v . ')';
        };

        $arguments = [$f, $g];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('g(f(g()))');

        $this
            ->__invoke()
            ->shouldReturn('g(f(g()))');
    }
}
