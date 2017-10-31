<?php
/**
 * Created by PhpStorm.
 * User: GLOBAL SERVICE PLUS
 * Date: 19/07/2017
 * Time: 21:44
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Category;
use AppBundle\Entity\Marque;
use AppBundle\Entity\Options;
use AppBundle\Entity\Product;
use AppBundle\Entity\Promo;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker\Factory;
class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{




    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker= Factory::create('fr_FR');
        $repositoryMarque = $manager->getRepository(Marque::class);
        $marque = $repositoryMarque->findAll();

        $repositoryCat = $manager->getRepository(Category::class);
        $cat = $repositoryCat->findAll();

        //Ajouter une category
        for ($i=0; $i<500; $i++){
            $product= new Product();
            $product->setName($faker->name);
            $product->setPrice($faker->randomNumber(2));
            $product->setCaracterisques($faker->text);
            $product->setVenteenligne($faker->boolean(50));
            $product->setDescription($faker->text);
            $kemarque=rand(0,15);
            $product->setMarque($marque[$kemarque]);
            $key=rand(0, 25);
            $product->setCategory($cat[$key]);
            $product->setStock($faker->numberBetween(0, 50));
            $product->setSlug($this->slugfy($product->getName()));
            $product->setAlwaysonsale($faker->boolean());
            //Ajouter des images

           // $product->addImage();
            // add options
            $option = new Options();
            $option->setCommentaire($faker->text);
            $option->setFavoris($faker->boolean);
            $option->setNotes($faker->numberBetween(0, 5));
            $option->setState($faker->randomKey(array(
                'new'=>'new',
                'sale'=>'sale',
                'promo'=>'promo'
            )));
            // Promo
            $promo=new Promo();
            $promo->setName('Promotion hivers');
            $promo->setDatedebut(new \DateTime('now'));
            $promo->setDatefin((new \DateTime('now'))->add(new \DateInterval('P10D')));
            $promo->setDiscounts($faker->numberBetween(20, 70));
            $manager->persist($promo);
            $option->setPromo($promo);
            $manager->persist($option);
            $product->setOptions($option);

            $manager->persist($product);
        }

        $manager->flush();
    }



    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
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
         dump($str);
        return strtolower($str);
    }
}
