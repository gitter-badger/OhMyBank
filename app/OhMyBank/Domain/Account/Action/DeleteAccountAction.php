<?php

namespace App\OhMyBank\Domain\Account\Action;

use App\OhMyBank\Domain\Account\Model\Account;

class DeleteAccountAction
{
    /**
     * @var Account
     */
    protected $account;

    /**
     * @param Account $account
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}
