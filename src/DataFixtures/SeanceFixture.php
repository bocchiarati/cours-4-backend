<?php

namespace App\DataFixtures;

use App\Entity\Seance;
use App\Repository\ExerciceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeanceFixture extends Fixture
{
    public function __construct(private readonly ExerciceRepository $exerciceRepository) {}
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $seance = new Seance();
            $seance->setName($faker->word);
            $seance->setDescription($faker->text);
            $seance->setExercises($faker->randomElement($this->exerciceRepository->findAll()));
            $manager->persist($seance);
        }
        $manager->flush();
    }
}