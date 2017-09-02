<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 19/06/17
 * Time: 22:47
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Theme;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadThemes implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $manager->getConnection()->getConfiguration()->setSQLLogger(null);

       $themes  = ['trav.theme.detente', 'trav.theme.sport', 'trav.theme.luxe'];

        foreach ($themes as $i => $th) {
            $theme  = new Theme();
            $theme->setLibelle($th);

            $manager->persist($theme);

            if ($i % 25 == 0) {
                $manager->flush();
                $manager->clear();
            }
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}