<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $html = '';

        $user = new User();
        $user->setFirstName('Peter')
            ->setLastName('Fisher')
            ->setPassword('1234567891')
        ;

        $product = new Product();
        $product->setTitle('')
            ->setDescription('Bar')
            ->setPrice('1.99')
            ;

        $userValidation = $this->get('app.validation_user');

        $isUserValid = $userValidation->isValid($user);
        $html.='IS USER VALID: '. json_encode($isUserValid). '<br/>';

        if(false === $isUserValid ){
            foreach($userValidation->getErrors() as $error){
                $html.= $error. '<br/>';
            }
        }

        $productValidation = $this->get('app.validation_product');
        $isProductValid = $productValidation->isValid($product);
        $html.='IS PRODUCT VALID: '. json_encode($isProductValid). '<br/>';

        if(false === $isProductValid ){
            foreach($productValidation->getErrors() as $error){
                $html.= $error. '<br/>';
            }
        }

        return $this->render('default/index.html.twig',[
            'html' => $html
        ]);
    }
}
