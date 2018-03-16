<?php
/**
 * Created by PhpStorm.
 * User: peterfisher
 * Date: 16/03/2018
 * Time: 07:56
 */

class EmailProcessor
{

    private $validators = [];

    public function setValidators(array $validators){
        foreach($validators as $validator){
            $this->addValidator($validator);
        }

        return $this;
    }

    public function addValidator(ValidatorInterface $validator){
        $this->validators[] = $validator;

        return $this;
    }

    public function process($email){

        if($this->isValid($email)){
            echo 'Sending email';
            $this->send($email);
        }else{
            echo 'Cannot send email';
        }

        return $this;
    }

    protected function send($email){

    }

    protected function isValid($email){

        $isValid = false;
        foreach($this->validators as $validator){
            $isValid = $validator->isValid($email);
            if(false === $isValid){
                break;
            }
        }

        return $isValid;
    }

}