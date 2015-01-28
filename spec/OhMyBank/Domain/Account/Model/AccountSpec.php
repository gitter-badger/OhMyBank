<?php

namespace spec\App\OhMyBank\Domain\Account\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\OhMyBank\Domain\Account\Model\Account');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function its_name_is_mutable()
    {
        $this->setName('Deposit account');
        $this->getName()->shouldReturn('Deposit account');
    }

    function it_initializes_initial_balance_by_default()
    {
        $this->getInitialBalance()->shouldReturn(0);
    }

    function its_initial_balance_is_mutable()
    {
        $this->setInitialBalance(100);
        $this->getInitialBalance()->shouldReturn(100);
    }

    function it_has_fluent_interface()
    {
        $this->setName('Deposit account')->shouldReturn($this);
        $this->setInitialBalance(100)->shouldReturn($this);
    }
}
