<?php
/**
 * Created by PhpStorm.
 * User: molina
 * Date: 01/11/17
 * Time: 15:25
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use UserBundle\Entity\User;

class LoadUserData extends  AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker= Factory::create();
        $user= new User();
        $user->setFirstname('momo');
        $user->setLastname('hello');
        $user->setPassword('hello');
        $user->setEmail('momo@hello.com');
        $user->setUsername('momo');
        $manager->persist($user);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 5;
    }
}