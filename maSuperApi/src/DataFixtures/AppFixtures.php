<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        var_dump($faker);
        for ($i = 0; $i < 30; $i++) {
            $user = new User();
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setrole($faker->randomElement($array = array ('ROLE_ADMIN','ROLE_USER','ROLE_EDITOR')));
            $user->setemail($faker->email);
            $user->setpassword($faker->password);
            $user->toArray();

            
            $manager->persist($user);
        }

        $manager->flush();

    }
}
