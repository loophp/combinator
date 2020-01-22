<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class TSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $arguments = ['foo', 'strtoupper'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('FOO');

        $this
            ->__invoke()
            ->shouldReturn('FOO');
    }
}
