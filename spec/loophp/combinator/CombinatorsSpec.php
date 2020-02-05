<?php

declare(strict_types=1);

namespace spec\loophp\combinator;

use Closure;
use loophp\combinator\Combinator\A;
use loophp\combinator\Combinator\B;
use loophp\combinator\Combinator\C;
use loophp\combinator\Combinator\D;
use loophp\combinator\Combinator\E;
use loophp\combinator\Combinator\F;
use loophp\combinator\Combinator\G;
use loophp\combinator\Combinator\H;
use loophp\combinator\Combinator\I;
use loophp\combinator\Combinator\J;
use loophp\combinator\Combinator\K;
use loophp\combinator\Combinator\Ki;
use loophp\combinator\Combinator\L;
use loophp\combinator\Combinator\M;
use loophp\combinator\Combinator\O;
use loophp\combinator\Combinator\Phoenix;
use loophp\combinator\Combinator\Psi;
use loophp\combinator\Combinator\Q;
use loophp\combinator\Combinator\R;
use loophp\combinator\Combinator\S;
use loophp\combinator\Combinator\T;
use loophp\combinator\Combinator\U;
use loophp\combinator\Combinator\V;
use loophp\combinator\Combinator\W;
use loophp\combinator\Combinator\Y;
use loophp\combinator\Combinator\Z;
use loophp\combinator\Combinators;
use PhpSpec\ObjectBehavior;

class CombinatorsSpec extends ObjectBehavior
{
    public function it_can_test_the_A_combinator()
    {
        $a = static function (string $x): string {
            return sprintf('%s(%s)', 'a', $x);
        };

        $this::A()($a)('b')
            ->shouldBeEqualTo(A::with()($a)('b'));

        $this::A()($a)('b')
            ->shouldReturn(Combinators::S()(Combinators::K())((Combinators::S())(Combinators::K()))($a)('b'));
    }

    public function it_can_test_the_B_combinator()
    {
        $a = static function (string $x): string {
            return sprintf('%s(%s)', 'a', $x);
        };

        $b = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::B()($a)($b)('c')
            ->shouldBeEqualTo(B::with()($a)($b)('c'));

        $this::B()($a)($b)('c')
            ->shouldReturn(
                Combinators::S() // S
                (
                    Combinators::K() // K
                    (Combinators::S()) // S
                )(
                    Combinators::K() // K
                )($a)($b)('c')
            );
    }

    public function it_can_test_the_C_combinator()
    {
        $f = static function ($x) {
            return static function ($y) use ($x) {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $this::C()($f)('b')('c')
            ->shouldBeEqualTo(C::with()($f)('b')('c'));

        $this::C()($f)('b')('c')
            ->shouldReturn(
                Combinators::S() // S
                (
                    Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()) // B
                    (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                    (Combinators::S()) // S
                )(
                    Combinators::K() // K
                    (Combinators::K()) // K
                )($f)('b')('c')
            );
    }

    public function it_can_test_the_D_combinator()
    {
        $f2 = static function (string $x) {
            return static function (callable $a) use ($x) {
                return 'a(' . $x . ')(' . $a('d') . ')';
            };
        };

        $g2 = static function (string $x) {
            return static function ($a) use ($x): string {
                return 'c(' . $x . ')';
            };
        };

        $this::D()($f2)('b')($g2)('d')
            ->shouldBeEqualTo(D::with()($f2)('b')($g2)('d'));

        $this::D()($f2)('b')($g2)('d')
            ->shouldReturn(
                Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()) // B
                (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                ($f2)('b')($g2)('d')
            );
    }

    public function it_can_test_the_E_combinator()
    {
        $f2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $a);
            };
        };

        $g2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'c', $x, $a);
            };
        };

        $this::E()($f2)('b')($g2)('d')('e')
            ->shouldBeEqualTo(E::with()($f2)('b')($g2)('d')('e'));

        $this::E()($f2)('b')($g2)('d')('e')
            ->shouldReturn(
                Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()) // B
                (
                    Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()) // B
                    (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                    (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                )($f2)('b')($g2)('d')('e')
            );
    }

    public function it_can_test_the_F_combinator()
    {
        $f2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'c', $x, $a);
            };
        };

        $this::F()('a')('b')($f2)
            ->shouldBeEqualTo(F::with()('a')('b')($f2));

        $this::F()('a')('b')($f2)
            ->shouldReturn(
                Combinators::S()(Combinators::K()((Combinators::S()(Combinators::K()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))))(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))) // E
                (Combinators::S()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))(Combinators::S()))(Combinators::K()(Combinators::K()))(Combinators::I())) // T
                (Combinators::S()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))(Combinators::S()))(Combinators::K()(Combinators::K()))(Combinators::I())) // T
                (Combinators::S()(Combinators::K()((Combinators::S()(Combinators::K()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))))(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))))) // E
                (Combinators::S()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))(Combinators::S()))(Combinators::K()(Combinators::K()))(Combinators::I())) // T
                ('a')('b')($f2)
            );
    }

    public function it_can_test_the_G_combinator()
    {
        $f2 = static function (string $x) {
            return static function (string $a) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $a);
            };
        };

        $g = static function (string $x) {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::G()($f2)($g)('c')('d')
            ->shouldBeEqualTo(G::with()($f2)($g)('c')('d'));

        $this::G()($f2)($g)('c')('d')
            ->shouldReturn(
                Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()) // B
                (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                (Combinators::S()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))(Combinators::S()))(Combinators::K()(Combinators::K()))) // C
                ($f2)($g)('c')('d')
            );
    }

    public function it_can_test_the_H_combinator()
    {
        $f3 = static function ($x) {
            return static function ($y) use ($x) {
                return static function ($z) use ($x, $y): string {
                    return sprintf('%s(%s)(%s)(%s)', 'a', $x, $y, $z);
                };
            };
        };

        $this::H()($f3)('b')('c')
            ->shouldBeEqualTo(H::with()($f3)('b')('c'));
    }

    public function it_can_test_the_I_combinator()
    {
        $this::I()('a')
            ->shouldBeEqualTo(I::with()('a'));

        $this::I()('a')
            ->shouldReturn((Combinators::S()(Combinators::K())(Combinators::K()))('a'));
    }

    public function it_can_test_the_J_combinator()
    {
        $f2 = static function (string $x) {
            return static function (string $y) use ($x): string {
                return 'a(' . $x . ')(' . $y . ')';
            };
        };

        $this::J()($f2)('b')('c')('d')
            ->shouldBeEqualTo(J::with()($f2)('b')('c')('d'));
    }

    public function it_can_test_the_K_combinator()
    {
        $this::K()('a')('b')
            ->shouldBeEqualTo(K::with()('a')('b'));
    }

    public function it_can_test_the_Ki_combinator()
    {
        $this::Ki()('a')('b')
            ->shouldBeEqualTo(Ki::with()('a')('b'));
    }

    public function it_can_test_the_L_combinator()
    {
        $f = static function (callable $x) {
            return sprintf('%s(%s)', 'a', $x());
        };

        $g = static function (?callable $x = null) {
            if (null === $x) {
                return 'b';
            }

            return static function () use ($x) {
                return sprintf('%s(%s)', 'b', $x());
            };
        };

        $this::L()($f)($g)
            ->shouldBeEqualTo(L::with()($f)($g));

        $this::L()($f)($g)
            ->shouldReturn(
                Combinators::S()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))(Combinators::S()))(Combinators::K()(Combinators::K())) // C
                (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                (Combinators::S()(Combinators::S()(Combinators::K())(Combinators::K()))(Combinators::S()(Combinators::K())(Combinators::K()))) // M
                ($f)($g)
            );
    }

    public function it_can_test_the_M_combinator()
    {
        $f = static function (?callable $x = null) {
            if (null === $x) {
                return 'a';
            }

            return sprintf('%s(%s)', 'a', $x());
        };

        $this::M()($f)
            ->shouldBeEqualTo(M::with()($f));

        $this::M()($f)
            ->shouldReturn(
                Combinators::S() // S
                (Combinators::S()(Combinators::K())(Combinators::K())) // I
                (Combinators::S()(Combinators::K())(Combinators::K())) // I
                ($f)
            );
    }

    public function it_can_test_the_O_combinator()
    {
        $f = static function (?callable $x = null) {
            if (null === $x) {
                return 'a';
            }

            return sprintf('%s(%s)', 'a', $x());
        };

        $g = static function (?string $x = null) {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::O()($f)($g)
            ->shouldBeEqualTo(O::with()($f)($g));

        $this::O()($f)($g)
            ->shouldReturn(
                Combinators::S() // S
                (Combinators::I()) // I
                ($f)($g)
            );
    }

    public function it_can_test_the_Phoenix_combinator()
    {
        $f2 = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $h = static function (string $x): string {
            return sprintf('%s(%s)', 'c', $x);
        };

        $this::Phoenix()($f2)($g)($h)('d')
            ->shouldBeEqualTo(Phoenix::with()($f2)($g)($h)('d'));
    }

    public function it_can_test_the_Psi_combinator()
    {
        $f2 = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::Psi()($f2)($g)('c')('d')
            ->shouldBeEqualTo(Psi::with()($f2)($g)('c')('d'));
    }

    // CB
    public function it_can_test_the_Q_combinator()
    {
        $f = static function (string $x) {
            return sprintf('%s(%s)', 'a', $x);
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::Q()($f)($g)('c')
            ->shouldBeEqualTo(Q::with()($f)($g)('c'));

        $this::Q()($f)($g)('c')
            ->shouldReturn(
                Combinators::S()(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))(Combinators::S()))(Combinators::K()(Combinators::K())) // C
                (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                ($f)($g)('c')
            );
    }

    public function it_can_test_the_R_combinator()
    {
        $f = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'b', $x, $y);
            };
        };

        $this::R()('a')($f)('c')
            ->shouldBeEqualTo(R::with()('a')($f)('c'));

        $this::R()('a')($f)('c')
            ->shouldReturn(
                Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()) // B
                (Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())) // B
                (Combinators::S()(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))(Combinators::S()))(Combinators::K()(Combinators::K()))(Combinators::I())) // T
                ('a')($f)('c')
            );
    }

    public function it_can_test_the_S_combinator()
    {
        $f2 = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::S()($f2)($g)('c')
            ->shouldBeEqualTo(S::with()($f2)($g)('c'));
    }

    public function it_can_test_the_T_combinator()
    {
        $f = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::T()('a')($f)
            ->shouldBeEqualTo(T::with()('a')($f));

        $this::T()('a')($f)
            ->shouldReturn(
                (Combinators::S()(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())(Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))(Combinators::S()))(Combinators::K()(Combinators::K()))) // C
                (Combinators::I()) // I
                ('a')($f)
            );
    }

    public function it_can_test_the_U_combinator()
    {
        $f2 = static function (?callable $x = null) {
            if (null === $x) {
                return static function () {
                    return 'b';
                };
            }

            return static function ($y) use ($x) {
                if (null === $x()) {
                    return 'a()';
                }

                return sprintf('%s(%s)(%s)', 'a', 'a', $x()());
            };
        };

        $g = static function (string $x): string {
            return sprintf('%s(%s)', 'b', $x);
        };

        $this::U()($f2)($g)
            ->shouldBeEqualTo(U::with()($f2)($g));
    }

    public function it_can_test_the_V_combinator()
    {
        $f = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'c', $x, $y);
            };
        };

        $this::V()('a')('b')($f)
            ->shouldBeEqualTo(V::with()('a')('b')($f));

        $this::V()('a')('b')($f)
            ->shouldReturn(
                Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()) // B
                (Combinators::S()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))(Combinators::S()))(Combinators::K()(Combinators::K()))) // C
                (Combinators::S()((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K()))((Combinators::S()(Combinators::K()(Combinators::S()))(Combinators::K())))(Combinators::S()))(Combinators::K()(Combinators::K()))(Combinators::I())) // T
                ('a')('b')($f)
            );
    }

    public function it_can_test_the_W_combinator()
    {
        $f = static function (string $x) {
            return static function (string $y) use ($x): string {
                return sprintf('%s(%s)(%s)', 'a', $x, $y);
            };
        };

        $this::W()($f)('b')
            ->shouldBeEqualTo(W::with()($f)('b'));
    }

    public function it_can_test_the_Y_combinator()
    {
        $f = static function (callable $function): Closure {
            return static function ($n = 1) use ($function) {
                return (1 >= $n) ? 1 : $n * $function($n - 1);
            };
        };

        $this::Y()($f)(6)
            ->shouldBeEqualTo(Y::with()($f)(6));
    }

    public function it_can_test_the_Z_combinator()
    {
        $f = static function (callable $function): Closure {
            return static function () use ($function): Closure {
                return static function ($n = 1) use ($function) {
                    return (1 >= $n) ? 1 : $n * $function()()($n - 1);
                };
            };
        };

        $this::Z()($f)()(6)
            ->shouldBeEqualTo(Z::with()($f)()(6));
    }
}
