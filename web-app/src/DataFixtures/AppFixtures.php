<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\Tutor;
use App\Entity\User;
use App\Helper\Hash;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       // User tutor
       $user = new User();
       $user->setEmail('tutorandrej@gmail.com');
       $user->setPassword(Hash::make($user, 'secret'));
       $manager->persist($user);
       $manager->flush();

       // Tutor 
       $tutor = new Tutor();
       $tutor->setName('Tutor Andrej');
       $tutor->setUserId($user);

       $dt = new \DateTimeImmutable();

       $tutor->setCreatedAt($dt);
       $tutor->setUpdatedAt($dt);

       $manager->persist($tutor);
       $manager->flush();

       // Group
       $group = new Group();
       $group->setName('Web-design');

       $dt = new \DateTimeImmutable();

       $group->setCreatedAt($dt);
       $group->setUpdatedAt($dt);

       $group->setTutor($tutor);

       $manager->persist($group);
       $manager->flush();
    }
}
