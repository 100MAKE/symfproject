<?php

namespace App\DataFixtures;

use App\Entity\Professeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfesseurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
    $noms=["moussa moss","moussa khoulé","modou lakh","ndiaga gnaw","moussa wandiaga"];
    $grades=["etudiant","artiste","ingenieur","footballeur","lutteur"];
    for ($i = 1; $i <=10; $i++) {
    $pos= rand(0,4);
    $professeur = new Professeur();
    $professeur->setNomcomplet($noms[$pos]);
    $professeur->setGrade($grades[$pos]);
    $manager->persist($professeur);
    $this->addReference("Professeur".$i, $professeur);
    }

        $manager->flush();
    }
}
