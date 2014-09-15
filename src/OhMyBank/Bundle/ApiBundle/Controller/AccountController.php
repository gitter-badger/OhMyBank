<?php

namespace OhMyBank\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

use OhMyBank\Bundle\ApiBundle\Facade\Account;

class AccountController extends FOSRestController
{
    public function newAccountAction()
    {

    }

    public function getAccountAction(Account $account)
    {
        return $account;
    }

    /**
     * @param Account $account
     */
    private function getForm(Account $account)
    {
        return $this->createForm('ohmybank_account', $account);
    }
}
