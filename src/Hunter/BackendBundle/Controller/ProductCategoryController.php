<?php

namespace Hunter\BackendBundle\Controller;

use Hunter\EntityBundle\Entity\ProductCategory;
use Hunter\EntityBundle\Form\ProductCategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Product controller.
 *
 */
class ProductCategoryController extends Controller
{
    /**
     * Lists all product entities.
     *
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('HunterEntityBundle:ProductCategory')->findAll();

        return [
            'categories' => $categories,
        ];
    }

    /**
     * Creates a new product entity.
     *
     * @Template()
     *
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function newAction(Request $request)
    {
        $category = new ProductCategory();
        $form = $this->createForm(ProductCategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            dump($category, $category->getSlug(), $form->getData());
            $em->flush();

            return $this->redirectToRoute('hunter_backend_product_category_show', array('id' => $category->getId()));
        }

        return [
            'category' => $category,
            'form' => $form->createView(),
        ];
    }

    /**
     * Finds and displays a product entity.
     *
     * @Template()
     *
     * @param ProductCategory $category
     * @return array
     */
    public function showAction(ProductCategory $category)
    {
        $deleteForm = $this->createDeleteForm($category);

        return [
            'category' => $category,
            'delete_form' => $deleteForm->createView(),
        ];
    }

    /**
     * Displays a form to edit an existing product entity.
     *
     * @Template()
     *
     * @param Request $request
     * @param ProductCategory $category
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction(Request $request, ProductCategory $category)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($category);
        $editForm = $this->createForm(ProductCategoryType::class, $category);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em->flush();

            return $this->redirectToRoute('hunter_backend_product_category_edit', array('id' => $category->getId()));
        }

        return [
            'category' => $category,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ];
    }

    /**
     * Deletes a product entity.
     * @param Request $request
     * @param ProductCategory $category
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, ProductCategory $category)
    {
        $form = $this->createDeleteForm($category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($category);
            $em->flush();
        }

        return $this->redirectToRoute('hunter_backend_product_category_index');
    }

    /**
     * Creates a form to delete a product entity.
     *
     * @param ProductCategory $product The product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductCategory $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hunter_backend_product_category_delete', array('id' => $product->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
