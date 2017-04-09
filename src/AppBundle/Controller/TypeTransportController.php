<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeTransport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typetransport controller.
 *
 */
class TypeTransportController extends Controller
{
    /**
     * Lists all typeTransport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeTransports = $em->getRepository('AppBundle:TypeTransport')->findAll();

        return $this->render('typetransport/index.html.twig', array(
            'typeTransports' => $typeTransports,
        ));
    }

    /**
     * Creates a new typeTransport entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeTransport = new Typetransport();
        $form = $this->createForm('AppBundle\Form\TypeTransportType', $typeTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeTransport);
            $em->flush();

            return $this->redirectToRoute('type_transport_show', array('id' => $typeTransport->getId()));
        }

        return $this->render('typetransport/new.html.twig', array(
            'typeTransport' => $typeTransport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeTransport entity.
     *
     */
    public function showAction(TypeTransport $typeTransport)
    {
        $deleteForm = $this->createDeleteForm($typeTransport);

        return $this->render('typetransport/show.html.twig', array(
            'typeTransport' => $typeTransport,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeTransport entity.
     *
     */
    public function editAction(Request $request, TypeTransport $typeTransport)
    {
        $deleteForm = $this->createDeleteForm($typeTransport);
        $editForm = $this->createForm('AppBundle\Form\TypeTransportType', $typeTransport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_transport_edit', array('id' => $typeTransport->getId()));
        }

        return $this->render('typetransport/edit.html.twig', array(
            'typeTransport' => $typeTransport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeTransport entity.
     *
     */
    public function deleteAction(Request $request, TypeTransport $typeTransport)
    {
        $form = $this->createDeleteForm($typeTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeTransport);
            $em->flush();
        }

        return $this->redirectToRoute('type_transport_index');
    }

    /**
     * Creates a form to delete a typeTransport entity.
     *
     * @param TypeTransport $typeTransport The typeTransport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeTransport $typeTransport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('type_transport_delete', array('id' => $typeTransport->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
