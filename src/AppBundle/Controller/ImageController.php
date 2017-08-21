<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Album;
use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

class ImageController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function addAction(Request $request){

        $image  = new Image();
        $form   = $this->createForm(ImageType::class,$image,['method' => 'POST', 'action' => $this->generateUrl('trav_add_image')]);
        $_em    = $this->getDoctrine()->getManager();
        $user   = $this->getUser();
        $form->handleRequest($request);

        if($request->getMethod()=='POST' && $form->isSubmitted() && $form->isValid()){

            $_em->persist($image);

            $album   = $this->getDoctrine()->getRepository('AppBundle:Album')->findOneBy(['nomAlbum' => 'Default', 'owner' => $user->getId()]);
            if(!$album){
                $album  = new Album();
                $album->setOwner($user);
            }
            $album->addImage($image);

            $_em->persist($album);

            $_em->flush();

            return $this->redirect($this->generateUrl('trav_add_image'));
        }

        $albums     = $this->getDoctrine()->getRepository('AppBundle:Album')->findBy(['owner' => $user->getId()]);

        return $this->render(
            'AppBundle:Travelleurs:image.manager.html.twig',
            [
                'form' => $form->createView(),
                'albums' => $albums
            ]
        );

    }

    public function imageprofileAction(Image $image){

        $user   = $this->getUser();

        $user->setPhotoProfile($image);
        $_em    = $this->getDoctrine()->getManager();

        $_em->persist($user);
        $_em->flush();

        return $this->redirect($this->generateUrl('trav_add_image'));
    }
}
