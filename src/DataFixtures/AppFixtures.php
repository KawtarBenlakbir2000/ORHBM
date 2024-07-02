<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\ActionFactory;
use App\Factory\DataFactory;
use App\Factory\IncidentFactory;
use App\Factory\ModuleFactory;
use App\Factory\OngletFactory;
use App\Factory\UserFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        IncidentFactory::createMany(3);


        $manager->flush();
    }
}
