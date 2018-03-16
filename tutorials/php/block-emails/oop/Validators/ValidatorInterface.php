<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 16/03/2018
 * Time: 08:28
 */

interface ValidatorInterface
{

    public function isValid($email);
    public function setBlackList(array $blackList);
}