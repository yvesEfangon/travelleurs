<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etape;
use AppBundle\Entity\Voyage;
use AppBundle\Form\SearchVoyageIndexType;
use AppBundle\Form\VoyageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VoyageController extends Controller
{
    public function indexAction()
    {
        $user       = $this->getUser();

        if(!$user) $this->redirect($this->generateUrl('homepage'));
        $repo           = $this->getDoctrine()->getRepository('AppBundle:Voyage');
        $voyages        = $repo->findBy(['owner' => $user]);
        $parcticipant   = $repo->findVoyageUsersById(['user' => $user]);

        $voyages        = array_merge($voyages,$parcticipant);

        return $this->render(
            'AppBundle:Voyage:index.html.twig',
            [
                'voyages' => $voyages
            ]
            );
    }

    public function addAction(Request $request){
        $this->get('session')->getFlashBag()->clear();

        $voyage = new Voyage();

        $form   = $this->createForm(
            'AppBundle\Form\VoyageType',
            $voyage,
            [
                'action' => $this->generateUrl('trav_add_voyage'),
                'method' => 'POST'
            ]
            );

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            //Pour chaque soumission du formulaire:
            if($form->isValid()){
                $_em    = $this->getDoctrine()->getManager();
                $_em->persist($form->getData());

                if($_em->flush()){
                   return $this->redirect($this->generateUrl('trav_edit_voyage',['id' => $voyage->getId()]));
                }else{
                    $this->get('session')->getFlashBag()->add('danger', $this->get('translator')->trans('trav.saved.error'));
                }
            }
        }
        //Formulaire de recherche
        $form   = $this->createForm(VoyageType::class,null,[
            'action'=> $this->generateUrl('trav_search_form'),
            'method'=> 'POST',
            'attr'=> ['class'=>'form-horizontal']
        ]);

        return $this->render(
            'AppBundle:Voyage:add.step1.html.twig',
            [
                'formCreation' => $form->createView(),

            ]
            );
    }

    public function editAction(Voyage $voyage){

        $formVoygae2    = $this->createForm(
            'AppBundle\Form\VoyageType',
            $voyage,
            [
                'action' => $this->generateUrl('trav_edit_voyage'),
                'method' => 'POST'
            ]
            );

        $etape  = new Etape();
        $etape->setVoyage($voyage);
    }
    
}
