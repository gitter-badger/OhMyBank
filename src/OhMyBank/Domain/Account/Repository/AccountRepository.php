<?php

namespace OhMyBank\Domain\Account\Repository;

use OhMyBank\Domain\Account\Model\Account;

interface AccountRepository
{
    /**
     * @return Account
     */
    public function createNew();

    /**
     * @param Account $account
     */
    public function save(Account $account);
}