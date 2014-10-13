<?php

namespace OhMyBank\Bundle\ApiBundle\Facade;

use OhMyBank\Domain\Account\Model\Account as AccountModel;

class Account
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    public $initialBalance;

    /**
     * @param AccountModel $account
     */
    public function __construct(AccountModel $account)
    {
        $this->id             = $account->getId();
        $this->name           = $account->getName();
        $this->initialBalance = $account->getInitialBalance();
    }
}
