<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Contact controller.
 *
 * @Route("contact")
 */
class ContactController extends Controller
{
    /**
     * Lists all contact entities.
     *
     * @Route("/", name="contact_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $contact = new Contact();
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            /**@var Contact $contact * */
            $contact = $form->getData();
            $message = (new \Swift_Message('contact site global service'))
                ->setFrom($contact->getEmailfrom())
                ->setTo($this->getParameter('admin_mailler2'))
                ->setBody($contact->getContactbody());
            if($this->get('mailer')->send($message)){
                $messageSend=sprintf("votre méssage à bien été envoyé merci");
                $this->get('session')->getFlashBag()->add('contact_success', $messageSend);
            }else{
                $messageSend=sprintf("erreur d'envoie");
                $this->get('session')->getFlashBag()->add('contact_error', $messageSend);

            }

        }
        return $this->render('contact/index.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a contact entity.
     *
     * @Route("/{id}", name="contact_show")
     * @Method("GET")
     */
    public function showAction(Contact $contact)
    {

        return $this->render('contact/show.html.twig', array(
            'contact' => $contact,
        ));
    }

}
