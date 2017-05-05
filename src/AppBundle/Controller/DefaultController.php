<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle::index.html.twig');
    }


    /**
     * @Route ("/changeLocale/{langue}", name = "changeLocale")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function setLocaleAction(Request $request, $langue){

        $url     = $request->headers->get('referer')? $request->headers->get('referer') : $this->generateUrl("homepage");
        $session = $request->getSession();
        $session->set('_locale',$langue);

        return $this->redirect($url);
    }
}
