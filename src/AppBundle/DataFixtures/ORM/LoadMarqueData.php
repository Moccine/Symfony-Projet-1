<?php

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
            $marque->setSlug($this->slugfy($data[$i]));
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

    public  function  slugfy($str){
        $str=htmlspecialchars_decode(($str));
        $str=str_replace('é', 'e', $str);
        $str=str_replace('è', 'e', $str);
        $str=str_replace('ô', 'o', $str);
        $str=str_replace('â', 'a', $str);
        $str=explode(" ", $str);
        $str=array_map('trim', $str);
        if (($key = array_search('-', $str)) !== false) {
            unset($str[$key]);
        }
        $str=implode('-', $str);

        return strtolower($str);
    }
}