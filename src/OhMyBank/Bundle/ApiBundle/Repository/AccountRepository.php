<?php

namespace OhMyBank\Bundle\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;
use OhMyBank\Bundle\ApiBundle\Entity\Account as AccountEntity;
use OhMyBank\Domain\Account\Model\Account;
use OhMyBank\Domain\Account\Repository\AccountRepository as AccountRepositoryInterface;

class AccountRepository extends EntityRepository implements AccountRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        return new AccountEntity();
    }

    /**
     * {@inheritdoc}
     */
    public function save(Account $account)
    {
        $this->_em->persist($account);
        $this->_em->flush($account);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Account $account)
    {
        $this->_em->remove($account);
        $this->_em->flush($account);
    }
}
