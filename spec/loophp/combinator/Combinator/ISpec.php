<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class ISpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this::of()('a')
            ->shouldReturn('a');
    }
}
