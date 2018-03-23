<?php

namespace AppBundle\Validation\Validator;

use AppBundle\Entity\User;

interface UserValidatorInterface{

    public function validate(User $user);
}