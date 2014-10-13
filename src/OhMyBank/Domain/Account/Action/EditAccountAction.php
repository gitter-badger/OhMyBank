<?php

namespace OhMyBank\Domain\Account\Action;

use OhMyBank\Domain\Account\Model\Account;

class EditAccountAction
{
    /**
     * @var Account
     */
    protected $account;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $initialBalance;

    /**
     * @param Account $account
     */
    public function __construct(Account $account)
    {
        $this->account        = $account;
        $this->name           = $account->getName();
        $this->initialBalance = $account->getInitialBalance();
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     *
     * @return EditAccountAction
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return EditAccountAction
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getInitialBalance()
    {
        return $this->initialBalance;
    }

    /**
     * @param float $initialBalance
     *
     * @return EditAccountAction
     */
    public function setInitialBalance($initialBalance)
    {
        $this->initialBalance = $initialBalance;

        return $this;
    }
}