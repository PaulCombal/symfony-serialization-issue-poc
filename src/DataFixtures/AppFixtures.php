<?php

namespace App\DataFixtures;

use App\Entity\DateTest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $date_entity = new DateTest();
        $now = new \DateTime();
        $date_entity->setDate($now);

        $manager->persist($date_entity);
        $manager->flush();
    }
}
