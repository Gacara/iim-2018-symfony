<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Post::class);
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        $repo = $this->getDoctrine()->getRepository(Post::class);

        $posts = $repo->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }


    /**
     * @Route("/about", name="about")
     */
    public function about()
    {

        return $this->render('about/index.html.twig');
    }




}
