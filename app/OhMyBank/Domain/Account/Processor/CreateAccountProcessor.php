<?php

namespace OhMyBank\Domain\Account\Processor;

use OhMyBank\Domain\Account\Action\CreateAccountAction;
use OhMyBank\Domain\Account\Model\Account;
use OhMyBank\Domain\Account\Repository\AccountRepository;

class CreateAccountProcessor
{
    /**
     * @var AccountRepository
     */
    protected $repository;

    /**
     * @param AccountRepository $repository
     */
    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateAccountAction $action
     *
     * @return Account
     */
    public function execute(CreateAccountAction $action)
    {
        $account = $this->repository->createNew();
        $account->setName($action->getName());
        $account->setInitialBalance($action->getInitialBalance());

        $this->repository->save($account);

        return $account;
    }
}
