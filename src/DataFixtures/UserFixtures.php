<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture

{


      public function __construct(
        private UserPasswordHasherInterface $passwordEncoder
      ) 
      {
        
      }
    public function load(ObjectManager $manager): void
    {  
        // $email=["s10@gmail.com","s100make@hotmail.com","sklr@gmail.com","domramgmail.com","lofftus@gmail.com"];
        // $password=["........",".......","1232....","1233555444","12232337889","1455877889"];
    }
    
}
