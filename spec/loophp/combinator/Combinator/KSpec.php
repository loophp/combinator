<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class KSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $arguments = ['a', 'b'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a');

        $this
            ->__invoke()
            ->shouldReturn('a');
    }
}
