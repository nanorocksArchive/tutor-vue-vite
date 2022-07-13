<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\Student;
use App\Entity\Tutor;
use App\Entity\User;
use App\Helpers\Enums\UserRolesEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // User tutor
        $user = $manager->getRepository(User::class)->create([
            'email' => 'tutorandrej@gmail.com',
            'password' => 'secret',
            'roles' => [UserRolesEnum::ROLE_TUTOR]
        ]);

        // Tutor 
        $dt = new \DateTimeImmutable();

        $tutor = $manager->getRepository(Tutor::class)->create([
            'name' => $faker->name,
            'user' => $user,
            'created_at' => $dt,
            'updated_at' => $dt
        ]);

        // Group
        $dt = new \DateTimeImmutable();

        $group = $manager->getRepository(Group::class)->create([
            'name' => 'Web-design',
            'created_at' => $dt,
            'updated_at' => $dt,
            'tutor' => $tutor
        ]);


        for ($i = 0; $i < 5; $i++) {

            $user = $manager->getRepository(User::class)->create([
                'email' => $faker->email,
                'password' => 'secret',
                'roles' => [UserRolesEnum::ROLE_STUDENT]
            ]);

            $manager->getRepository(Student::class)->create([
                'name' => $faker->name,
                'is_blocked' => false,
                'user' => $user,
                'group' => $group
            ]);
        }
    }
}
