<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class KSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $arguments = ['bar', 'foo'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('bar');

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('bar');
    }
}
