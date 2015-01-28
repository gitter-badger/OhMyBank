<?php

namespace App\OhMyBank\Domain\Account\Processor;

use OhMyBank\Domain\Account\Action\EditAccountAction;
use OhMyBank\Domain\Account\Model\Account;
use OhMyBank\Domain\Account\Repository\AccountRepository;

class EditAccountProcessor
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
     * @param EditAccountAction $action
     *
     * @return Account
     */
    public function execute(EditAccountAction $action)
    {
        $account = $action->getAccount();
        $account->setName($action->getName());
        $account->setInitialBalance($action->getInitialBalance());

        $this->accountRepository->save($account);

        return $account;
    }
}
