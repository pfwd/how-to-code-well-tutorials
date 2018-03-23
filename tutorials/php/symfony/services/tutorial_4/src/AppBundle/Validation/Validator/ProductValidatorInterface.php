<?php

namespace AppBundle\Validation\Validator;

use AppBundle\Entity\Product;

interface ProductValidatorInterface{

    public function validate(Product $product);
}