<?php

namespace spec\App\OhMyBank\Domain\Account\Action;

use App\OhMyBank\Domain\Account\Model\Account;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EditAccountActionSpec extends ObjectBehavior
{
    function let(Account $account)
    {
        $account->getName()->willReturn('Deposit');
        $account->getInitialBalance()->willReturn(10.00);

        $this->beConstructedWith($account);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\OhMyBank\Domain\Account\Action\EditAccountAction');
    }

    function it_initializes_account_by_default(Account $account)
    {
        $this->getAccount()->shouldReturn($account);
    }

    function its_account_is_mutable(Account $account)
    {
        $this->setAccount($account);
        $this->getAccount()->shouldReturn($account);
    }

    function it_initializes_name_by_default()
    {
        $this->getName()->shouldReturn('Deposit');
    }

    function its_name_is_mutable()
    {
        $this->setName('My Deposit');
        $this->getName()->shouldReturn('My Deposit');
    }

    function it_initializes_initial_balance_by_default()
    {
        $this->getInitialBalance()->shouldReturn(10.00);
    }

    function its_initial_balance_is_mutable()
    {
        $this->setInitialBalance(150.00);
        $this->getInitialBalance()->shouldReturn(150.00);
    }

    function it_has_fluent_interface(Account $account)
    {
        $this->setAccount($account)->shouldReturn($this);
        $this->setName('Deposit')->shouldReturn($this);
        $this->setInitialBalance(10.00)->shouldReturn($this);
    }
}
