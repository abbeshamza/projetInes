<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeVoiture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typevoiture controller.
 *
 */
class TypeVoitureController extends Controller
{
    /**
     * Lists all typeVoiture entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeVoitures = $em->getRepository('AppBundle:TypeVoiture')->findAll();

        return $this->render('typevoiture/index.html.twig', array(
            'typeVoitures' => $typeVoitures,
        ));
    }

    /**
     * Creates a new typeVoiture entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeVoiture = new Typevoiture();
        $form = $this->createForm('AppBundle\Form\TypeVoitureType', $typeVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeVoiture);
            $em->flush();

            return $this->redirectToRoute('voiture_type_show', array('id' => $typeVoiture->getId()));
        }

        return $this->render('typevoiture/new.html.twig', array(
            'typeVoiture' => $typeVoiture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeVoiture entity.
     *
     */
    public function showAction(TypeVoiture $typeVoiture)
    {
        $deleteForm = $this->createDeleteForm($typeVoiture);

        return $this->render('typevoiture/show.html.twig', array(
            'typeVoiture' => $typeVoiture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeVoiture entity.
     *
     */
    public function editAction(Request $request, TypeVoiture $typeVoiture)
    {
        $deleteForm = $this->createDeleteForm($typeVoiture);
        $editForm = $this->createForm('AppBundle\Form\TypeVoitureType', $typeVoiture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('voiture_type_edit', array('id' => $typeVoiture->getId()));
        }

        return $this->render('typevoiture/edit.html.twig', array(
            'typeVoiture' => $typeVoiture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeVoiture entity.
     *
     */
    public function deleteAction(Request $request, TypeVoiture $typeVoiture)
    {
        $form = $this->createDeleteForm($typeVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeVoiture);
            $em->flush();
        }

        return $this->redirectToRoute('voiture_type_index');
    }

    /**
     * Creates a form to delete a typeVoiture entity.
     *
     * @param TypeVoiture $typeVoiture The typeVoiture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeVoiture $typeVoiture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voiture_type_delete', array('id' => $typeVoiture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
