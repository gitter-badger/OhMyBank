<?php

namespace OhMyBank\Domain\Account\Action;

class CreateAccountAction
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $initialBalance;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @param float $initialBalance
     *
     * @return $this
     */
    public function setInitialBalance($initialBalance)
    {
        $this->initialBalance = $initialBalance;

        return $this;
    }

    /**
     * @return float
     */
    public function getInitialBalance()
    {
        return $this->initialBalance;
    }
}