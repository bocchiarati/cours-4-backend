<?php

namespace App\DataFixtures;

use App\Entity\Exercice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ExerciceFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');
        for ($i = 1; $i <= 20; $i++) {
            $ex = new Exercice();
            $ex->setName($faker->words(3, true));
            $manager->persist($ex);
        }
        $manager->flush();
    }
}
