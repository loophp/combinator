<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class YSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($function) {
            return static function ($n = 1) use ($function) {
                return (1 >= $n) ? 1 : $n * $function($n - 1);
            };
        };

        $arguments = [$f];

        $this->beConstructedWith(...$arguments);

        $this()(6)
            ->shouldReturn(720);

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $closure = $this
            ->closure();

        $closure($f)(6)
            ->shouldReturn(720);
    }
}
