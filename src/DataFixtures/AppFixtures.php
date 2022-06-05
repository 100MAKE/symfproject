<?php

namespace App\DataFixtures;
use App\Entity\Classe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
     {
    //     $faker = Faker\Factory::create('fr_FR');
    
    //     $auteurs = Array();
    //     for ($i = 0; $i < 10; $i++) {
    //         $auteurs[$i] = new Classe();
    //         $auteurs[$i]->setLibelleclasse($faker->lastName);
    //         $auteurs[$i]->setFiliere($faker->firstName);
    //         $auteurs[$i]->setNiveau($faker->address);

    //         $manager->persist($auteurs[$i]);
    //     }
    // nouvelle boucle pour créer des livres

    // $livres = Array();

    // for ($i = 0; $i < 12; $i++) {
    //         $livres[$i] = new Livre();
    //         $livres[$i]->setTitre($faker->sentence($nbWords = 6, $variableNbWords = true));
    //         $livres[$i]->setAnnee($faker->numberBetween($min = 1900, $max = 2020));
    //         $livres[$i]->setAuteur($auteurs[$i % 3]);

    //         $manager->persist($livres[$i]);
    //     }


        $manager->flush();
    }
}
