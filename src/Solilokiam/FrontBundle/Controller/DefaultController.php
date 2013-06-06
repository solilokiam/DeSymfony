<?php

namespace Solilokiam\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $format = $this->getRequest()->getRequestFormat();

        return $this->render('SolilokiamFrontBundle:Default:index.'.$format.'.twig', array('name' => $name));
    }
}
