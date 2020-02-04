<?php

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use PhpSpec\ObjectBehavior;

class OmegaSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function ($x = null) {
            $out = 'a(';

            return static function () use ($out) {
                $out .= 'a)(a(a))';

                return $out;
            };
        };

        $arguments = [$f];

        $this->beConstructedWith(...$arguments);

        $this()
            ->shouldReturn('a(a)(a(a))');

        $this
            ->__invoke()
            ->shouldReturn('a(a)(a(a))');

        $this::on($f)
            ->shouldReturn('a(a)(a(a))');
    }
}
