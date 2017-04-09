<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Grade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Grade controller.
 *
 */
class GradeController extends Controller
{
    /**
     * Lists all grade entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $grades = $em->getRepository('AppBundle:Grade')->findAll();

        return $this->render('grade/index.html.twig', array(
            'grades' => $grades,
        ));
    }

    /**
     * Creates a new grade entity.
     *
     */
    public function newAction(Request $request)
    {
        $grade = new Grade();
        $form = $this->createForm('AppBundle\Form\GradeType', $grade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();

            return $this->redirectToRoute('grade_show', array('id' => $grade->getId()));
        }

        return $this->render('grade/new.html.twig', array(
            'grade' => $grade,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a grade entity.
     *
     */
    public function showAction(Grade $grade)
    {
        $deleteForm = $this->createDeleteForm($grade);

        return $this->render('grade/show.html.twig', array(
            'grade' => $grade,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing grade entity.
     *
     */
    public function editAction(Request $request, Grade $grade)
    {
        $deleteForm = $this->createDeleteForm($grade);
        $editForm = $this->createForm('AppBundle\Form\GradeType', $grade);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grade_edit', array('id' => $grade->getId()));
        }

        return $this->render('grade/edit.html.twig', array(
            'grade' => $grade,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a grade entity.
     *
     */
    public function deleteAction(Request $request, Grade $grade)
    {
        $form = $this->createDeleteForm($grade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($grade);
            $em->flush();
        }

        return $this->redirectToRoute('grade_index');
    }

    /**
     * Creates a form to delete a grade entity.
     *
     * @param Grade $grade The grade entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Grade $grade)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grade_delete', array('id' => $grade->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
