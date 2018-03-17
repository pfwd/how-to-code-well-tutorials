<?php
namespace AppBundle\Validation;
use AppBundle\Validation\Validator\ValidatorInterface;

class UserValidation implements ValidationInterface
{
    /**
     * @var ValidatorInterface
     */
    private $userValidator;

    public function __construct(ValidatorInterface $userValidator)
    {
        $this->userValidator = $userValidator;
    }

    public function isValid($user){
        $errors =  $this->userValidator->validate($user);
        return (count($errors) > 0) ? false : true;
    }
}