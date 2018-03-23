<?php


namespace AppBundle\Validation;

use AppBundle\Entity\Product;

interface ProductValidationInterface{

    public function isValid(Product $product);

}
