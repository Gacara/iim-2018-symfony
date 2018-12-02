<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Post;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 5; $i++){

            $post = new Post();
            $post   ->setTitle('Post n°' .$i)
                    ->setContent("Contenu n° $i :
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egestas nunc sit amet orci luctus, quis dapibus nibh tempus. Fusce eu est vel massa eleifend feugiat vulputate eget libero. Aliquam elementum leo ultrices ipsum dictum accumsan. Duis non tortor sed dolor consequat consectetur. Praesent vitae sodales nibh. Donec vehicula finibus eros, a tristique mauris vulputate nec. Donec sit amet placerat diam. Fusce dui turpis, mattis eget molestie vel, eleifend dignissim purus.")
                    ->setImage("http://placehold.it/400x300")
                    ->setCreatedAt(new \DateTime());


            $manager->persist($post);
        }


        $manager->flush();
    }
}
