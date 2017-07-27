<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 15/07/2017
 * Time: 02:57
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Marque;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMarqueData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data=$this->MarqueData();
        for ($i=0; $i<count($data); $i++){
            $marque = new Marque();
            $marque->setName($data[$i]);
            $marque->setDescription($data[$i]);
            $marque->setAuthor($data[$i]);
            $manager->persist($marque);
            $this->addReference('marque_' . $i, $marque);

        }

        $manager->flush();

    }

    private function MarqueData()
    {
        return array(
            'CISCO',
            'COMPAQ',
            'DELL',
            'LATITUDE',
            'DIGITAL',
            'EMC',
            'FUJITSU SIEMENS',
            'HP',
            'IBM',
            'LENOVO',
            'MAXTOR',
            'NEC',
            'QUANTUM',
            'SEAGATE',
            'SUN',
            'WYSE'
        );
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}