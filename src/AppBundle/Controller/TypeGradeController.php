<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeGrade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typegrade controller.
 *
 */
class TypeGradeController extends Controller
{
    /**
     * Lists all typeGrade entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeGrades = $em->getRepository('AppBundle:TypeGrade')->findAll();

        return $this->render('typegrade/index.html.twig', array(
            'typeGrades' => $typeGrades,
        ));
    }

    /**
     * Creates a new typeGrade entity.
     *
     */
    public function newAction(Request $request)
    {
        $typeGrade = new Typegrade();
        $form = $this->createForm('AppBundle\Form\TypeGradeType', $typeGrade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeGrade);
            $em->flush();

            return $this->redirectToRoute('grade_type_show', array('id' => $typeGrade->getId()));
        }

        return $this->render('typegrade/new.html.twig', array(
            'typeGrade' => $typeGrade,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeGrade entity.
     *
     */
    public function showAction(TypeGrade $typeGrade)
    {
        $deleteForm = $this->createDeleteForm($typeGrade);

        return $this->render('typegrade/show.html.twig', array(
            'typeGrade' => $typeGrade,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeGrade entity.
     *
     */
    public function editAction(Request $request, TypeGrade $typeGrade)
    {
        $deleteForm = $this->createDeleteForm($typeGrade);
        $editForm = $this->createForm('AppBundle\Form\TypeGradeType', $typeGrade);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grade_type_edit', array('id' => $typeGrade->getId()));
        }

        return $this->render('typegrade/edit.html.twig', array(
            'typeGrade' => $typeGrade,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeGrade entity.
     *
     */
    public function deleteAction(Request $request, TypeGrade $typeGrade)
    {
        $form = $this->createDeleteForm($typeGrade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeGrade);
            $em->flush();
        }

        return $this->redirectToRoute('grade_type_index');
    }

    /**
     * Creates a form to delete a typeGrade entity.
     *
     * @param TypeGrade $typeGrade The typeGrade entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeGrade $typeGrade)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grade_type_delete', array('id' => $typeGrade->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
