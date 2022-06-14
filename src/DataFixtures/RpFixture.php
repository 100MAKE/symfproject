<?php

namespace App\DataFixtures;

use App\Entity\Rp;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RpFixture extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        // $nomComplet = ["MAR GOMIS", "SAM SIDY", "KHADIM SYLL", "MALICK WANDIANGA", "ALY LAKH"];
        // $roles = ["ROLE_RP" ];
        // $adress = ["dakar", "thies", "saint louis", "mermoz dakar", "sacre coeur dakar"];
        // for ($i = 1; $i <= 10; $i++) {
        //     $pos = rand(0, 2);
        //     $rp = new Rp();
        //     $rp->setNomcomplet($nomComplet[$pos]);
        //     $rp->setEmail("Rp" . $i . "@gmail.com");

        //     $rp->setPassword($this->passwordEncoder->hashPassword($rp, '....'));
        //     $manager->persist($rp);
        //     $this->addReference("User" . $i, $rp);
        // }
        $manager->flush();
    }
}
