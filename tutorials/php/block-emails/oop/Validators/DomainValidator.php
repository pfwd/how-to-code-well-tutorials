<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 16/03/2018
 * Time: 08:14
 */

class DomainValidator implements ValidatorInterface
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
        $parts = preg_split('/@/', $email);
        if($parts[1]){
            if(false === in_array($parts[1], $this->blackList)){
                $isValid = true;
            }
        }
        return $isValid;
    }

}