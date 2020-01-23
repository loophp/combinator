<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class ASpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $a = static function (string $x): string {
            return sprintf('%s(%s)', 'a', $x);
        };

        $arguments = [$a, 'b'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(b)');

        $this
            ->__invoke()
            ->shouldReturn('a(b)');
    }
}
