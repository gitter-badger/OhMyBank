<?php

namespace OhMyBank\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use OhMyBank\Bundle\ApiBundle\Entity\Account;
use OhMyBank\Bundle\ApiBundle\Facade\Account as AccountFacade;
use OhMyBank\Domain\Account\Action\CreateAccountAction;

use Symfony\Component\HttpFoundation\Request;

class AccountController extends FOSRestController
{
    /**
     * @Rest\View
     */
    public function getAccountAction(Account $account)
    {
        return $account;
    }

    /**
     * @Rest\View
     */
    public function getAccountsAction()
    {
        $accounts = $this->get('ohmybank.repository.account')->findAll();

        $facades = array_map([$this, 'createFacade'], $accounts);

        return $facades;
    }

    /**
     * @Rest\View
     */
    public function postAccountAction(Request $request)
    {
        $action = new CreateAccountAction();

        $form = $this->get('form.factory')->createNamed('', 'ohmybank_account', $action);

        if ($form->handleRequest($request)->isValid()) {
            $account = $this->get('ohmybank.processor.create_account')->execute($action);
            $facade = $this->createFacade($account);

            return View::create($facade, 201);
        }

        return View::create($form, 400);
    }

    /**
     * @param Account $account
     *
     * @return AccountFacade
     */
    public function createFacade(Account $account)
    {
        return new AccountFacade($account);
    }
}
