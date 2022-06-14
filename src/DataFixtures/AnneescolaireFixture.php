<?php

namespace App\DataFixtures;

use App\Entity\Anneescolaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnneescolaireFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=2019; $i <2022 ; $i++) {
            $data=new Anneescolaire();
            $annee= $i."-".($i+1);
            $data->setLibelleannee($annee)
                   ->setEtatannee(false);
            $manager->persist($data);
            $this->addReference("Anneescolaire".$i, $data);
    }
    $manager->flush();
}
}