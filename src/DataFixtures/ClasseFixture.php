<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClasseFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    $niveaux=["L1","L2","L3"];
    $filieres=["MATHS","CHIMIE","SN"];
    for ($i = 1; $i <=10; $i++) {
    $pos= rand(0,2);
    $classe = new Classe();
    $classe->setLibelleclasse($niveaux[$pos]."  ".$filieres[$pos]);
    $classe->setNiveau($niveaux[$pos]);
    $classe->setFiliere($filieres[$pos]);
    $manager->persist($classe);
    $this->addReference("Classe".$i, $classe);
    }
    $manager->flush();
    }  
}
