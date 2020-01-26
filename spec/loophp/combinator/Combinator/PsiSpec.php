<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class PsiSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $arguments = [$f2, $g, 'c', 'd'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(b(c))(b(d))');

        $this
            ->__invoke()
            ->shouldReturn('a(b(c))(b(d))');

        $this::on($f2)($g)('c')('d')
            ->shouldReturn('a(b(c))(b(d))');
    }
}
