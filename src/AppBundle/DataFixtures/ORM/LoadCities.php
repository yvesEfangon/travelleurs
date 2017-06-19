<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 19/06/17
 * Time: 22:47
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Cities;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadCities implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);

        $csv = fopen(dirname(__DIR__).'/ORM/Cities3.csv', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv);

            if($line[0] !== '' && $line[1] !== '' && $line[2] != '') {

                $city = new Cities();

                $city->setCountryCode($line[0]);
                $city->setCityCode($line[1]);
                $city->setCity($line[2]);
                $city->setCoordinates($line[3]);

                $manager->persist($city);
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
        return 1;
    }
}