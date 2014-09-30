<?php

namespace OhMyBank\Domain\Account\Processor;

use OhMyBank\Domain\Account\Action\DeleteAccountAction;
use OhMyBank\Domain\Account\Model\Account;
use OhMyBank\Domain\Account\Repository\AccountRepository;

class DeleteAccountProcessor
{
    /**
     * @var AccountRepository
     */
    protected $accountRepository;

    /**
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * @param DeleteAccountAction $action
     *
     * @return Account
     */
    public function execute(DeleteAccountAction $action)
    {
        $account = $action->getAccount();

        $this->accountRepository->remove($account);

        return $account;
    }
}