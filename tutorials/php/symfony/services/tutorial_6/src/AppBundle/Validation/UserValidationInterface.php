<?php


namespace AppBundle\Validation;

use AppBundle\Entity\User;

interface UserValidationInterface{

    public function isValid(User $user);

}
