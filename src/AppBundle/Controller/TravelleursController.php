<?php

namespace AppBundle\Controller;

use AppBundle\Form\SearchVoyageIndexType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;

class TravelleursController extends Controller
{
    public function myprofileAction()
    {
        $user       = $this->getUser();

        return $this->render('AppBundle:Travelleurs:myprofile.html.twig',
            [
                'user' => $this->getUser()
            ]);
    }

    public function showmyprofileAction(){
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render(
            'AppBundle:Travelleurs:showmyprofile.html.twig',
            [
                'user'=>$user,

            ]
            );
    }
}
