<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function loadCv(ObjectManager $manager)
    {

    }

    public function loadExperience(ObjectManager $manager)
    {

    }

    public function loadFormation(ObjectManager $manager)
    {

    }

    public function loadUser(ObjectManager $manager)
    {

    }

}
