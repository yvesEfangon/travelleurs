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


class LoadLangues implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);

       $languages  = [
                    'Punjabi', 'French', 'Portuguese',
                    'Bengali', 'Russian', 'Hindi',
                    'Arabic', 'Spanish', 'English', 'Chinese'
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