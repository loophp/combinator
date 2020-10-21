<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class KiSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this::of()('a')('b')
            ->shouldReturn('b');
    }
}
