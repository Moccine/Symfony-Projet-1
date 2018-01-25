<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Price;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadPriceFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 500; $i++) {
            $price = new Price();
            $price->setPricemin($faker->numberBetween(15, 100));
            $price->setPricemax($faker->numberBetween(100, 500));
            $price->setCurrency($this->randomText($i, ["EUR", "US"]));
            $price->setUnity($this->randomText($i, ["kg", "litre"]));
            $price->setWholesaleprice($price->getPricemin() - 10);
            $price->setTaxrules(20);
            $price->setUnitprice($price->getPricemin());
            $manager->persist($price);
            $this->addReference('price_'.$i, $price);
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
        return 1;
    }

    private function randomText($key, $data)
    {
        return ($key % 2 )== 0 ? $data[0] : $data[1];
    }
}