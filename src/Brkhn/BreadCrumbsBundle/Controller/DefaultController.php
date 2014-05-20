<?php

namespace Brkhn\BreadCrumbsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BrkhnBreadCrumbsBundle:Default:index.html.twig');
    }
}
