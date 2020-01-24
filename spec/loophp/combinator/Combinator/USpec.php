<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class USpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f2 = static function (?callable $x = null) {
            if (null === $x) {
                return static function () {
                    return 'b';
                };
            }

            return static function ($y) use ($x) {
                if (null === $x()) {
                    return 'a()';
                }

                return sprintf('%s(%s)(%s)', 'a', 'a', $x()());
            };
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $arguments = [$f2, $g];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('b(a(a)(b))');

        $this
            ->__invoke()
            ->shouldReturn('b(a(a)(b))');
    }
}
