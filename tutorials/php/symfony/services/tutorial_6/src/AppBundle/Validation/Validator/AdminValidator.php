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
            $message ='Please have a better password';
            $this->errors[] = $message;
            $this->logger->info($message);
        }

        return $this->errors;
    }

}