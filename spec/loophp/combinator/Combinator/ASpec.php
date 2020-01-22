<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class ASpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $arguments = ['strtoupper', 'foo'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('FOO');

        $this
            ->__invoke()
            ->shouldReturn('FOO');
    }
}
