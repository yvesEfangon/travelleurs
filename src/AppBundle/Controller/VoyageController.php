<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etape;
use AppBundle\Entity\Lieu;
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
        $form   = $this->getVoyageForm($voyage);

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            //Pour chaque soumission du formulaire:
            if($form->isValid()){
                $voyageData = $form->getData();
                $voyageData->setOwner($this->getUser());

                $_em    = $this->getDoctrine()->getManager();
                $_em->persist($voyageData);

                if(!$_em->flush()){
                    $this->get('session')->getFlashBag()->add('danger', $this->get('translator')->trans('trav.saved.error'));
                }else{
                    $this->redirect(
                        $this->generateUrl('trav_edit_voyage',
                            ['id' => $voyageData->getId()]
                            )
                    );
                }
            }
        }

        return $this->render(
            'AppBundle:Voyage:add.voyage.html.twig',
            [
                'formCreation' => $form->createView(),
            ]
            );
    }

     /**
     * @param Etape $etape
     * @return \Symfony\Component\Form\Form
     */
    private function getEtapeForm(Etape $etape, $route='trav_add_voyage'){
        $formEtape  = $this->createForm(
            'AppBundle\Form\EtapeType',
            $etape,
            [
                'action' => $this->generateUrl($route),
                'method' => 'POST'
            ]
        );

        return $formEtape;
    }

    /**
     * @param Etape $etape
     * @param $voyageId
     * @return \Symfony\Component\Form\Form
     */
    private function getEtapeEditForm(Etape $etape, $voyageId){
        $formEtape  = $this->createForm(
            'AppBundle\Form\EtapeType',
            $etape,
            [
                'action' => $this->generateUrl('trav_edit_voyage', ['id' => $voyageId]),
                'method' => 'POST'
            ]
        );

        return $formEtape;
    }

    /**
     * @param Voyage $voyage
     * @return \Symfony\Component\Form\Form
     */
    private function getVoyageForm(Voyage $voyage, $route='trav_add_voyage')
    {
        $form   = $this->createForm(
            'AppBundle\Form\VoyageType',
            $voyage,
            [
                'action' => $this->generateUrl($route),
                'method' => 'POST'
            ]
        );

        return $form;
    }

    /**
     * @param Voyage $voyage
     * @return \Symfony\Component\Form\Form
     */
    private function getVoyageEditForm(Voyage $voyage)
    {
        $form   = $this->createForm(
            'AppBundle\Form\VoyageType',
            $voyage,
            [
                'action' => $this->generateUrl('trav_edit_voyage',['id' => $voyage->getId()]),
                'method' => 'POST'
            ]
        );

        return $form;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Voyage $voyage, Request $request){

        $formVoyage    = $this->getVoyageEditForm($voyage);
        $repo           = $this->getDoctrine()->getRepository('AppBundle:Etape');
        $checkEtape     = $repo->findBy(['voyage' => $voyage]);

        $etape  = new Etape();
        $etape->setVoyage($voyage);

        $lieuDepart     = new Lieu();
        $lieuArrivee    = new Lieu();
        $etape->setLieuDepart($lieuDepart);
        $etape->setLieuArrivee($lieuArrivee);

        $formEtape      = $this->getEtapeEditForm($etape,$voyage->getId());

        if($request->isMethod('POST')){
            $_em    = $this->getDoctrine()->getManager();

            if($formVoyage->isValid()){
                $_em->persist($voyage);
            }

            if($formEtape->isValid()){
                $_em->persist($formEtape);
            }

            if(!$_em->flush()){
                $this->get('session')->getFlashBag()->add('danger', $this->get('translator')->trans('trav.saved.error'));
            }
        }

        return $this->render(
            'AppBundle:Voyage:edit.voyage.html.twig',
            [
                'formVoyage' => $formVoyage->createView(),
                'formEtape' => $formEtape->createView()
            ]
        );
    }
    
}
