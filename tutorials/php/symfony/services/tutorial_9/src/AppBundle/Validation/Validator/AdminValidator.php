<?php
namespace AppBundle\Validation\Validator;

use AppBundle\Entity\User;
use Monolog\Logger;

class AdminValidator extends UserValidator
{
    /**
     * @var int
     */
    private $minPasswordLength;

    public $minPasswordLengthMessage = 'Please have a better password';

    /**
     * @var Logger
     */
    private $logger;

    public function __construct($minPasswordLength)
    {
        $this->minPasswordLength = $minPasswordLength;
    }

    /**
     * @param Logger $logger
     * @return $this
     */
    public function setLogger(Logger $logger){
        $this->logger = $logger;
        return $this;
    }

    public function validate(User $user){

        parent::validate($user);

        if(strlen($user->getPassword()) < $this->minPasswordLength){
            $this->errors[] = $this->minPasswordLengthMessage;
            $this->logger->info($this->minPasswordLengthMessage);
        }

        return $this->errors;
    }

}