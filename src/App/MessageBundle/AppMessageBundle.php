<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 01/09/2017
 * Time: 11:54
 */

namespace App\MessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;


class AppMessageBundle extends Bundle
{

    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSMessageBundle';
    }
}