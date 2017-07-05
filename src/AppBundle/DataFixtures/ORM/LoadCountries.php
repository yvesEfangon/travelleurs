<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 19/06/17
 * Time: 22:47
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Cities;
use AppBundle\Entity\Countries;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadCountries implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);

        $csv = fopen(dirname(__DIR__).'/ORM/Countries.csv', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv,null,',');

            if($line[0] !== '' && $line[1] ) {

                $country = new Countries();

                $country->setCountryCode($line[1]);
                $country->setCountryName($line[0]);

                $manager->persist($country);
                $i = $i + 1;
            }

            if ($i % 25 == 0) {
                $manager->flush();
                $manager->clear();
            }
        }

        fclose($csv);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}