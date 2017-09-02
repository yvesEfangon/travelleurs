<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etape;
use AppBundle\Entity\Lieu;
use AppBundle\Entity\Voyage;
use AppBundle\Form\SearchVoyageCompleteType;
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

               $_em->flush();

                return $this->redirect(
                    $this->generateUrl(
                        'trav_edit_voyage',
                        ['id' => $voyageData->getId()]
                        )
                );

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

private function getVoyageEditForm2(Voyage $voyage)
    {
        $form   = $this->createForm(
            'AppBundle\Form\VoyagePart2Type',
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
    public function editAction(Voyage $voyage, Request $request)
    {
        if (!$this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $this->get('session')->getFlashBag()->clear();

        $formVoyage    = $this->getVoyageEditForm($voyage);
        $repo           = $this->getDoctrine()->getRepository('AppBundle:Etape');

        $formVoyage2    = $this->getVoyageEditForm2($voyage);
        $etape  = new Etape();
        $etape->setVoyage($voyage);
        $formEtape      = $this->getEtapeEditForm($etape,$voyage->getId());

        $_em    = $this->getDoctrine()->getManager();

        if($request->isMethod('POST')){

            if ($request->request->has($formEtape->getName())) {
                // handle the first form
                $formEtape->handleRequest($request);

                if($formEtape->isValid()){
                    $dataEtape  = $formEtape->getData();
                    $dataEtape->setVoyage($voyage);

                    $lieuArrivee    = $dataEtape->getLieuArrivee();

                    $_em->persist($lieuArrivee);
                    $lieuDepart     = $dataEtape->getLieuDepart();
                    $_em->persist($lieuDepart);
                    $_em->persist($dataEtape);
                }
            }

            if ($request->request->has($formVoyage->getName())) {
                // handle the first form
                $formVoyage->handleRequest($request);
                if($formVoyage->isValid()){
                    $_em->persist($voyage);
                }
            }

            if($request->request->has($formVoyage2->getName())){
                $formVoyage2->handleRequest($request);
                if($formVoyage2->isValid()){
                    $voyage->setPublished(true);
                    $_em->persist($voyage);
                }
            }

            $_em->flush();

            return $this->redirect(
                $this->generateUrl('trav_edit_voyage', ['id' => $voyage->getId()])
            );

        }

        $ExistingEtapes     = $repo->findBy(['voyage' => $voyage]);

        return $this->render(
            'AppBundle:Voyage:edit.voyage.html.twig',
            [
                'formVoyage' => $formVoyage->createView(),
                'formVoyage2' => $formVoyage2->createView(),
                'formEtape' => $formEtape->createView(),
                'ExistingEtapes' => $ExistingEtapes,
                'currentVoyage' => $voyage
            ]
        );
    }


    public function removeetapeAction(Etape $etape)
    {
        if (!$this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
           return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $_em    = $this->getDoctrine()->getManager();

      $voyage = $etape->getVoyage();

        $_em->remove($etape);
        $_em->flush();

        return $this->redirect(
            $this->generateUrl('trav_edit_voyage', ['id' => $voyage->getId()])
        );

    }

    public function removevoyageAction(Voyage $voyage){
        $_em            = $this->getDoctrine()->getManager();
        $repo           = $this->getDoctrine()->getRepository('AppBundle:Etape');


        $ExistingEtapes     = $repo->findBy(['voyage' => $voyage]);
        foreach ($ExistingEtapes as $etape){
            $_em->remove($etape);
        }

        $_em->remove($voyage);
        $_em->flush();

        return $this->redirect(
            $this->generateUrl('trav_index_voyage')
        );
    }

    public function searchAction(Request $request){

        //Formulaire de recherche
        $form   = $this->createForm(
            'AppBundle\Form\SearchVoyageCompleteType',null,[
            'action'=> $this->generateUrl('trav_search_form'),
            'method'=> 'POST',
            'attr'=> ['class'=>'form-horizontal']
        ]);
        $reqData   = $request->request;
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            if($form->isValid()){
                $data   = $form->getData();
                $add = $request->get('address');
                $data['address']    = $add;
                $form->setData($data);
            }
        }else{
            $data = $reqData->all();
            $data    = @$data['search_voyage_index'];
            $etape    = new Etape();
            //$voy->
            $form->setData($data);
        }

        return $this->render(
            'AppBundle:Voyage:search.voyage.html.twig',
            [
                'form' => $form->createView(),
                'test' => $reqData->all()
            ]
        );

    }
}
