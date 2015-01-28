<?php

namespace App\OhMyBank\Domain\Account\Repository;

use App\OhMyBank\Domain\Account\Model\Account;

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

    /**
     * @param Account $account
     */
    public function remove(Account $account);
}
