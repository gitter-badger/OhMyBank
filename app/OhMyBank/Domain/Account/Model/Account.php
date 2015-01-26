<?php

namespace OhMyBank\Domain\Account\Model;

class Account
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $initialBalance;

    public function __construct()
    {
        $this->initialBalance = 0;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
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
