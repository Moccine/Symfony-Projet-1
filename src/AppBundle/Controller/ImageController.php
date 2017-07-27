<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use AppBundle\Form\ImageType;
use AppBundle\Service\ImagesManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("/image")
 */
class ImageController extends Controller
{
    /**
     * @Route("/", name="index_images")
     */
    public  function indexAction(){
        $images = $this->getDoctrine()
            ->getRepository(Image::class)->findAll();
        return $this->render('image/index.html.twig',
            array('images' => $images));
    }
    /**
     * @Route("/add", name="add_image")
     */
    public function addAction(Request $request, ImagesManager $imageUploader)
    {
        $image = new Image();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //recuperation des donnees
            /**@var Image $datas */
            $datas = $form->getData();
            dump($datas);
            /** @var UploadedFile $file */
            $file = $datas->getFile();
            $fileName = $imageUploader->upload($file);
            $image->setAlt($datas->getAlt());
            $image->setUser($this->getUser());
            $image->setFilename($fileName);
            $em->persist($image);
            $em->flush();
        }
        return $this->render('image/addImage.html.twig',
            array('form' => $form->createView()));
    }

    /**
     * @Route("/remove/{id}", name="remove_image")
     */
    public function deleteAction(Request $request, ImagesManager $imageUploader)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()
            ->getManager();
        $repository = $this->getDoctrine()
            ->getRepository(Image::class);

        /** @var Image $image */
        $image = $repository->find($id);
        $file = $image->getFilename();
        if ($imageUploader->removeFile($file)) {
            $em->remove($image);
            $em->flush();
            return $this->redirect('index_images');
        }


    }

    /**
     *@Route("/update/{id}", name="update_image")
     */
    public  function updateActio(Request $request, ImagesManager $imagesManager){
        $id = $request->get('id');
        $em = $this->getDoctrine()
            ->getManager();
        $repository = $this->getDoctrine()
            ->getRepository(Image::class);

        /** @var Image $image */
        $image = $repository->find($id);
        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //recuperation des donnees
            /**@var Image $datas */
            $datas = $form->getData();
            /** @var UploadedFile $file */
            $file = $datas->getFile();
            $fileName = $imagesManager->upload($file);
            $image->setAlt($datas->getAlt());
            $image->setUser($this->getUser());
            $image->setFilename($fileName);
            $em->persist($image);
            $em->flush();
        }
        return $this->render('image/update.html.twig',
            array('form' => $form->createView()));
    }
}
