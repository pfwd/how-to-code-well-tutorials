<?php
namespace AppBundle\Validation\Validator;

use AppBundle\Entity\User;

class UserValidator implements UserValidatorInterface, ValidatorInterface
{
    protected $errors = [];

    public function getErrors(){
        return $this->errors;
    }

    public function validate(User $user){
        if(empty($user->getFirstName())){
            $this->errors[] = 'Please add a first name';
        }
        if(empty($user->getLastName())){
            $this->errors[] = 'Please add a last name';
        }
        return $this->errors;
    }

}