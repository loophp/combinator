<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class CSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $concat = static function (...$x) {
            return static function (...$y) use ($x) {
                return implode('', array_merge($x, $y));
            };
        };

        $arguments = [$concat, 'a', 'b'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('ba');

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('ba');
    }
}
