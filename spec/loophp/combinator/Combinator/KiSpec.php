<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class KiSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $arguments = ['bar', 'foo'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('foo');

        $this
            ->__invoke()
            ->shouldReturn('foo');
    }
}
