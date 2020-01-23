<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class PhoenixSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($a) {
            return static function ($b) use ($a) {
                return 'f(' . $a . ')(' . $b . ')';
            };
        };

        $g = static function ($a) {
            return 'g(' . $a . ')';
        };

        $h = static function ($a) {
            return 'h(' . $a . ')';
        };

        $arguments = [$f, $g, $h, 'x'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('f(g(x))(h(x))');

        $this
            ->__invoke()
            ->shouldReturn('f(g(x))(h(x))');
    }
}
