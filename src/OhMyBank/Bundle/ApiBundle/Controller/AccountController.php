<?php

namespace OhMyBank\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use OhMyBank\Bundle\ApiBundle\Entity\Account;
use OhMyBank\Bundle\ApiBundle\Facade\Account as AccountFacade;
use OhMyBank\Domain\Account\Action\CreateAccountAction;

use OhMyBank\Domain\Account\Action\DeleteAccountAction;
use OhMyBank\Domain\Account\Action\EditAccountAction;
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

        $facades = array_map([$this, 'createAccountFacade'], $accounts);

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
            $facade = $this->createAccountFacade($account);

            return View::create($facade, 201);
        }

        return View::create($form, 400);
    }

    /**
     * @Rest\View
     */
    public function putAccountAction(Request $request, Account $account)
    {
        $action = new EditAccountAction($account);
        $form = $this->get('form.factory')->createNamed('', 'ohmybank_account', $action);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $this->get('ohmybank.processor.edit_account')->execute($action);

            return View::create(null, 204);
        }

        return View::create($form, 400);
    }

    /**
     * @Rest\View
     */
    public function deleteAccountAction(Account $account)
    {
        $action = new DeleteAccountAction($account);
        $this->get('ohmybank.processor.delete_account')->execute($action);

        return View::create(null, 204);
    }

    /**
     * @param Account $account
     *
     * @return AccountFacade
     */
    public function createAccountFacade(Account $account)
    {
        return new AccountFacade($account);
    }
}
