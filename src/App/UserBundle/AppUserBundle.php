<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 03/04/2016
 * Time: 14:29
 */

namespace App\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class AppUserBundle
 * @package App\UserBundle
 */
class AppUserBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
       return 'FOSUserBundle';
    }
}