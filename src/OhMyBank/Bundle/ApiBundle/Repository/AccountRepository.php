<?php

namespace OhMyBank\Bundle\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use OhMyBank\Domain\Account\Model\Account;
use OhMyBank\Domain\Account\Repository\AccountRepository as AccountRepositoryInterface;

class AccountRepository extends EntityRepository implements AccountRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        return new Account();
    }

    /**
     * {@inheritdoc}
     */
    public function save(Account $account)
    {
        $this->_em->persist($account);
        $this->_em->flush($account);
    }
}