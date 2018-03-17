<?php
namespace AppBundle\Validation\Validator;

class UserValidator implements ValidatorInterface
{
    public function validate($user){
        $errors = [];
        if(empty($user->firstName)){
            $errors[] = 'Please add a first name';
        }
        if(empty($user->lastName)){
            $errors[] = 'Please add a last name';
        }
        return $errors;
    }

}