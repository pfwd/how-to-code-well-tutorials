<?php
namespace AppBundle\Validation\Validator;

use AppBundle\Entity\User;

class AdminValidator extends UserValidator
{
    public function __construct($minPasswordLength)
    {

    }

    public function validate(User $user){

        parent::validate($user);

        if(strlen($user->getPassword()) < 5){
            $this->errors[] = 'Please have a better password';
        }

        return $this->errors;
    }

}