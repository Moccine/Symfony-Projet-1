<?php
/**
 * Created by PhpStorm.
 * User: Momo Junior
 * Date: 24/10/2017
 * Time: 11:28
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Venteenligne;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class loadVenteenligneData  extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $data=$this->getDatas();
        for ($i=0; $i<count($data); $i++){
            $venteenligne=new Venteenligne();
            $venteenligne->setSlug(htmlspecialchars_decode ($this->slugfy($data[$i])));
            $venteenligne->setName($data[$i]);
            $venteenligne->setDescription("");
            $manager->persist($venteenligne);
        }
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
    private function getDatas(){
        return array(
            "Les Alimentations",
           "Les Ecrans",
           "Les Cartes-Mères",
           "Les PC Complets",
           "Les Disques",
           "Les Serveurs",
        );
    }

    public  function  slugfy($str){
   $str=htmlspecialchars_decode(($str));
   $str=str_replace('é', 'e', $str);
   $str=str_replace('è', 'e', $str);
   $str=str_replace('ô', 'o', $str);
   $str=explode(" ", $str);
   $str=array_map('trim', $str);
   $str=implode('-', $str);

        return strtolower($str);
    }

}