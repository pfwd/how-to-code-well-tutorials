<?php
namespace AppBundle\Validation\Validator;

use AppBundle\Entity\User;

class AdminValidator extends UserValidator
{
    /**
     * @var int
     */
    private $minPasswordLength;

    public function __construct($minPasswordLength)
    {
        $this->minPasswordLength = $minPasswordLength;
    }

    public function validate(User $user){

        parent::validate($user);

        if(strlen($user->getPassword()) < $this->minPasswordLength){
            $this->errors[] = 'Please have a better password';
        }

        return $this->errors;
    }

}