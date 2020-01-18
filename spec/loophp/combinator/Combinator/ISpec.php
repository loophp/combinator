<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class ISpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $arguments = ['foo'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('foo');

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('foo');
    }
}
