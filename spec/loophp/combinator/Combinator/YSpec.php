<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\combinator\Combinator;

use Closure;
use PhpSpec\ObjectBehavior;

class YSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $f = static function (callable $function): Closure {
            return static function ($n = 1) use ($function) {
                return (1 >= $n) ? 1 : $n * $function($n - 1);
            };
        };

        $this::of()($f)(6)
            ->shouldReturn(720);
    }
}
