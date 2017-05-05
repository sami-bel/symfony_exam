<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/products", name ="products")
     * @return Response
     */
    public function allProductsAction(){
        $em       = $this->getDoctrine();
        $products = $em->getRepository('AppBundle:Product')->findAll();

        return $this->render("AppBundle::products.html.twig", ['products' => $products]);

    }

    /**
     * @Route("/stock", name ="stock")
     * @return Response
     */
    public function allProductsInStockAction(){
        $em       = $this->getDoctrine();
        $products = $em->getRepository('AppBundle:Product')->findBy(['inStock' => true]);

        return $this->render("AppBundle::stock.html.twig", ['products' => $products]);

    }



    /**
     * @Route("/new_product", name ="newProduct")
     */
    public function newAction(Request $request)
    {

        $product = new Product();

        $form    = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $this->addFlash(
                'success',
                $translated = $this->get('translator')->trans('product.succes')
            );

            return $this->redirectToRoute('products');
        }

        return $this->render('AppBundle::newProduct.html.twig', array('form' =>$form->createView()));
    }

    /**
     * @Route("/products/{id}/addToStock", name="addToStock")
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addToStockAction(Request $request, Product $product){


        $token = $request->query->get('token');

        if(! $this->isCsrfTokenValid('addProduct'.$product->getId(),$token)){

            $this->addFlash(
                'error',
                $translated = $this->get('translator')->trans('token.invalide')
            );
            return $this->redirectToRoute("products");
        }

        if( !$product->getInStock()){
            $product->setInStock(true);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }



        return $this->redirectToRoute("showProduct", array('id' =>$product->getId()));
    }

    /**
     * @Route("/products/{id}/deleteFromStock", name="deleteFromStock")
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteFromStockAction(Request $request, Product $product){


        $token = $request->query->get('token');

        if(! $this->isCsrfTokenValid('deleteProduct'.$product->getId(),$token)){

            $this->addFlash(
                'error',
                $translated = $this->get('translator')->trans('token.invalide')
            );
            return $this->redirectToRoute("products");
        }

        if( $product->getInStock() == true){
            $product->setInStock(false);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }

        return $this->redirectToRoute("showProduct", array('id' =>$product->getId()));
    }


    /**
     * @Route("/products/{id}/show", name="showProduct")
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function showProductAction(Product $product){
        return $this->render('AppBundle::showProduct.html.twig', array('product' =>$product));
    }

}
