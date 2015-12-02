<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PostController extends Controller
{
    /**
     * @Route("/post/{slug}", name="post_show")
     */
    public function showAction($slug)
    {
        $post = $this->getDoctrine()->getRepository('AppBundle:Post')->findOneBy(compact('slug'));

        if (!$post) throw $this->createNotFoundException();

        return $this->render('AppBundle:Post:show.html.twig', compact('post', 'comments'));
    }

}
