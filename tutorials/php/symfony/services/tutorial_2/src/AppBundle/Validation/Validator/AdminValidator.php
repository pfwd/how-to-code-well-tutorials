<?php
namespace AppBundle\Validation\Validator;

class AdminValidator extends UserValidator
{
    public function validate($user){

        $errors = parent::validate($user);

        if(strlen($user->password) < 5){
            $errors[] = 'Please have a better password';
        }

        return $errors;
    }

}