<?php

declare(strict_types=1);

namespace spec\tests\loophp\combinator;

use InvalidArgumentException;
use PhpSpec\ObjectBehavior;

class BadCombinatorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this
            ->shouldThrow(InvalidArgumentException::class)
            ->during('with');
    }
}
