<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 19/06/17
 * Time: 22:47
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Langue;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadStates implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);

       $languages  = [
                    'trav.lang.punjabi', 'trav.lang.french', 'trav.lang.portuguese',
                    'trav.lang.bengali', 'trav.lang.russian', 'trav.lang.hindi',
                    'trav.lang.arabic', 'trav.lang.spanish', 'trav.lang.english', 'trav.lang.chinese'
                    ];

        foreach ($languages as $i => $language) {
            $lang  = new Langue();
            $lang->setCode($language);

            $manager->persist($lang);

            if ($i % 25 == 0) {
                $manager->flush();
                $manager->clear();
            }
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}