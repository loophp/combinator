<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
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
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('FOO');
    }
}
