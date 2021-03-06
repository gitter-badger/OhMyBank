<?php

namespace spec\App\OhMyBank\Domain\Account\Action;

use App\OhMyBank\Domain\Account\Model\Account;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteAccountActionSpec extends ObjectBehavior
{
    function let(Account $account)
    {
        $this->beConstructedWith($account);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\OhMyBank\Domain\Account\Action\DeleteAccountAction');
    }

    function it_gets_account(Account $account)
    {
        $this->getAccount()->shouldReturn($account);
    }
}
