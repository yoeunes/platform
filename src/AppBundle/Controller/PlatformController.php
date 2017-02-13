<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlatformController extends Controller
{
    /**
     * @Route("/", name="home.index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        return $this->render('website/index.html.twig');
    }
}
