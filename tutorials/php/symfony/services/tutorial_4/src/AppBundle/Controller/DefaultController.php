<?php

namespace AppBundle\Controller;

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

        $user = new \stdClass();
        $user->firstName = 'Peter';
        $user->lastName = 'Fisher';
        $user->password = 'abc';

        $userValidation = $this->get('app.validation_user');

        $html.='IS VALID: '. json_encode($userValidation->isValid($user)). '<br/>';


        return $this->render('default/index.html.twig',[
            'html' => $html
        ]);
    }
}
