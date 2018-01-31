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
        $arr = ['A','B','A','D'];
        foreach($arr as $val){
            $checker = $this->get('app.checker');
            $html.='DEFAULT: '. json_encode($checker::isValid()). '<br/>';
            $html.='IS VALID: '. json_encode($checker::isValid($val)). '<br/>';
        }

        return $this->render('default/index.html.twig',[
            'html' => $html
        ]);
    }
}
