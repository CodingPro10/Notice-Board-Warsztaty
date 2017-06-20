<?php

namespace NoticeBoardBundle\Controller;

use NoticeBoardBundle\Entity\Notice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Notice controller.
 *
 * @Route("category")
 */
class NoticeCatController extends Controller
{
    /**
     * Lists all notice entities.
     *
     * @Route("/", name="category_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notices = $em->getRepository('NoticeBoardBundle:Notice')->findAll();

        return $this->render('notice/index.html.twig', array(
            'notices' => $notices,
        ));
    }

    /**
     * Creates a new notice entity.
     *
     * @Route("/new", name="category_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $notice = new NoticeCategory();
        $form = $this->createForm('NoticeBoardBundle\Form\NoticeType', $notice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($notice);
            $em->flush();

            return $this->redirectToRoute('category_show', array('id' => $notice->getId()));
        }

        return $this->render('notice/new.html.twig', array(
            'notice' => $notice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a notice entity.
     *
     * @Route("/{id}", name="category_show")
     * @Method("GET")
     */
    public function showAction(Notice $notice)
    {
        $deleteForm = $this->createDeleteForm($notice);

        return $this->render('notice/show.html.twig', array(
            'notice' => $notice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing notice entity.
     *
     * @Route("/{id}/edit", name="category_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Notice $notice)
    {
        $deleteForm = $this->createDeleteForm($notice);
        $editForm = $this->createForm('NoticeBoardBundle\Form\NoticeType', $notice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_edit', array('id' => $notice->getId()));
        }

        return $this->render('notice/edit.html.twig', array(
            'notice' => $notice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a notice entity.
     *
     * @Route("/{id}", name="category_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Notice $notice)
    {
        $form = $this->createDeleteForm($notice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($notice);
            $em->flush();
        }

        return $this->redirectToRoute('category_index');
    }

    /**
     * Creates a form to delete a notice entity.
     *
     * @param Notice $notice The notice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Notice $notice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('category_delete', array('id' => $notice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}



//Czyba trzeba zrobić od nowa Crud, żeby prawidłowo gemerowały się encje