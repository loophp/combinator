<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class LSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (callable $x) {
            return sprintf('%s(%s)', 'a', $x());
        };

        $g = static function (?callable $x = null) {
            if (null === $x) {
                return 'b';
            }

            return static function () use ($x) {
                return sprintf('%s(%s)', 'b', $x());
            };
        };

        $this::of()($f)($g)
            ->shouldReturn('a(b(b))');
    }
}
