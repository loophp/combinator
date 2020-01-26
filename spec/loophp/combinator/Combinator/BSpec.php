<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class BSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $a = static function (string $x): string {
            return sprintf('%s(%s)', 'a', $x);
        };

        $b = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $arguments = [$a, $b, 'c'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(b(c))');

        $this
            ->__invoke()
            ->shouldReturn('a(b(c))');

        $this::on($a)($b)('c')
            ->shouldReturn('a(b(c))');
    }
}
