<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class MSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (?callable $x = null) {
            if (null === $x) {
                return 'a';
            }

            return sprintf('%s(%s)', 'a', $x());
        };

        $arguments = [$f];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(a)');

        $this
            ->__invoke()
            ->shouldReturn('a(a)');

        $this::on($f)
            ->shouldReturn('a(a)');
    }
}
