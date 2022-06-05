<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\BrowserKit\Response;


class ClasseFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    $niveaux=["L1","L2","L3","M1","M2"];
    $filieres=["MATHS","CHIMIE","SN","DEV","PC"];
    for ($i = 1; $i <=10; $i++) {
    $pos= rand(0,4);
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
