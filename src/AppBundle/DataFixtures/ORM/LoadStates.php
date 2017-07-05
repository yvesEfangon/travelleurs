<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 19/06/17
 * Time: 22:47
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Cities;
use AppBundle\Entity\States;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadStates implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);

        $csv = fopen(dirname(__DIR__).'/ORM/States.csv', 'r');

        $i = 0;

        while (!feof($csv)) {
            $line = fgetcsv($csv,null,',');

            if($line[1] !== '' && $line[2] ) {
                $l1 = trim($line[1]);
                $state_code   = $l1;
                $stateName  = trim($line[2]);

                if(preg_match("#[A-Z]{2}\-[A-Z0-9]{2}#",$l1)!==1){
                    $state_code = $line[2];
                    $stateName          = $line[3];
                }
                $code   = explode("-",$state_code);

                $state = new States();
                $state->setCountryCode($code[0]);
                $state->setStateCode($state_code);
                $state->setStateName($stateName);

                $manager->persist($state);
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
        return 3;
    }
}