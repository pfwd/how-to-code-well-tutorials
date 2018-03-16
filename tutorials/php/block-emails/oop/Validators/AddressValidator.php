<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 16/03/2018
 * Time: 08:14
 */

class AddressValidator implements ValidatorInterface
{
    private $blackList = [];

    public function __construct(array $blackList)
    {
        $this->blackList = $blackList;
    }

    public function setBlackList(array $blackList)
    {
        $this->blackList = $blackList;
    }

    public function isValid($email)
    {
        $isValid = false;
        if (false === in_array($email, $this->blackList)) {
            $isValid = true;
        }
        return $isValid;
    }

}