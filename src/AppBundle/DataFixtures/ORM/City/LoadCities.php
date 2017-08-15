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

        $csv = fopen(dirname(__DIR__).'/City/Cities.txt', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv);

            if($line[0] !== '' && $line[1] !== '' && $line[2] != '') {

                $city = new Cities();

                $city->setCountryCode(strtoupper($line[0]));
                $city->setCity(ucfirst($line[1]));
                $city->setCityAccent(ucfirst($line[2]));
                $city->setRegion(strtoupper($line[3]));
                $city->setLatitude($line[5]);
                $city->setLongitude($line[6]);

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