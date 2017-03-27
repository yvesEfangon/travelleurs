<?php

namespace AppBundle\Controller;

use AppBundle\Form\SearchVoyageIndexType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\User\UserInterface;

class TravelleursController extends Controller
{
    public function mypageAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        //Formulaire de recherche
        $form   = $this->createForm(SearchVoyageIndexType::class,null,[
            'action'=> $this->generateUrl('trav_search_form'),
            'method'=> 'POST',
            'attr'=> ['class'=>'form-horizontal']
        ]);

        return $this->render('AppBundle:Travelleurs:mypage.html.twig',
            [
                'form_search'=>$form->createView(),
                'user'=>$user
            ]);
    }
}
