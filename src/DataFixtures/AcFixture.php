<?php

namespace App\DataFixtures;

use App\Entity\Ac;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Void_;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AcFixture extends Fixture

{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        $nomComplet = ["MARC GOMIS", "SAMAKE SIDY", "KHADIM SYLLA", "MOUSSA WANDIANGA", "ALY MOSS"];
        $roles = ["ROLE_AC", "ROLE_PROFESSEUR", "ROLE_RP", "ROLE_ETUDIANT"];
        $adress = ["dakar", "thies", "saint louis", "mermoz dakar", "sacre coeur dakar"];
        for ($i = 1; $i <= 10; $i++) {
            $pos = rand(0, 2);
            $user = new Ac();
            $user->setNomcomplet($nomComplet[$pos]);
            $user->setEmail("Ac" . $i . "@gmail.com");

            $user->setPassword($this->passwordEncoder->hashPassword($user, '....'));
            $manager->persist($user);
            $this->addReference("User" . $i, $user);
        }
        $manager->flush();
    }
}
