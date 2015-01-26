<?php

namespace spec\OhMyBank\Domain\Account\Action;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateAccountActionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('OhMyBank\Domain\Account\Action\CreateAccountAction');
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function its_name_is_mutable()
    {
        $this->setName('Deposit');
        $this->getName()->shouldReturn('Deposit');
    }

    function it_has_no_initial_balance_by_default()
    {
        $this->getInitialBalance()->shouldReturn(null);
    }

    function its_initial_balance_is_mutable()
    {
        $this->setInitialBalance(10.00);
        $this->getInitialBalance()->shouldReturn(10.00);
    }

    function it_has_fluent_interface()
    {
        $this->setName('Deposit')->shouldReturn($this);
        $this->setInitialBalance(10.00)->shouldReturn($this);
    }
}
