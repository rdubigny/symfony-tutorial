<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name, $count)
    {
        $templating = $this->container->get('templating');
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('EventBundle:Event');
        $event = $repo->findOneBy(array(
                'name' => 'Darth\'s surprise birthday party',
        ));

        $arr = array(
            'name' => $name,
            'count' => $count,
            'event' => $event,
        );

        $resp = $this->render(
            'EventBundle:Default:index.html.twig',
            $arr
        );
        // $resp = new Response(json_encode($arr));
        // $resp->headers->set('Content-Type', 'application/json');
        return $resp;
    }

    public function homeAction()
    {
        return $this->render('EventBundle:Default:home.html.twig');
    }
}
