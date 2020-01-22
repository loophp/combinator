<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class MSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (?callable $x = null) {
            if (null === $x) {
                return 'null';
            }

            return 'arg' . $x();
        };

        $arguments = [$f];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('argnull');

        $this
            ->__invoke()
            ->shouldReturn('argnull');
    }
}
