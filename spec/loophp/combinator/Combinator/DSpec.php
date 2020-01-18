<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class DSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x) {
            return static function (callable $a) use ($x) {
                return 'f(' . $x . ')(' . $a('y') . ')';
            };
        };

        $g = static function ($x) {
            return static function ($a) use ($x) {
                return 'g(' . $x . ')';
            };
        };

        $arguments = [$f, 'x', $g, 'y'];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('f(x)(g(y))');

        $this
            ->closure()
            ->shouldReturnAnInstanceOf(Closure::class);

        $this
            ->closure()(...$arguments)
            ->shouldReturn('f(x)(g(y))');
    }
}
