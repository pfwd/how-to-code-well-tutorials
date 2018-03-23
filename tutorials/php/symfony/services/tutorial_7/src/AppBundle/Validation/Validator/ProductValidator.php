<?php
namespace AppBundle\Validation\Validator;

use AppBundle\Entity\Product;

class ProductValidator implements ProductValidatorInterface, ValidatorInterface
{

    private $errors = [];

    public function getErrors(){
        return $this->errors;
    }


    public function validate(Product $product){
        if(empty($product->getTitle())){
            $this->errors[] = 'Please add a product title';
        }
        if(empty($product->getDescription())){
            $this->errors[] = 'Please add a product description';
        }
        return $this->errors;
    }

}