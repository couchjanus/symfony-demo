<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Brand;
use Doctrine\Persistence\ManagerRegistry;

class BrandController extends AbstractController
{
    #[Route('/brand', name: 'brand')]
    public function index(): Response
    {
        return $this->render('brand/index.html.twig', [
            'controller_name' => 'BrandController',
        ]);
    }

    #[Route('/create-brand', name: 'create_brand')]
    public function create(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $brand = new Brand();
        $brand->setName("Some new brand");
        $brand->setDescription("Some brand");
        $em->persist($brand);
        $em->flush();

        return new Response("Brand created successfully ".$brand->getName());
    }
//    public function create(): Response
//    {
//        $em = $this->getDoctrine()->getManager();
//        $brand = new Brand();
//        $brand->setName("Some brand");
//        $brand->setDescription("Some brand");
//        $em->persist($brand);
//        $em->flush();
//
//        return new Response("Brand created successfully ".$brand->getName());
//    }

    #[Route('/brand/edit/{id}', name: 'edit_brand')]
    public function update(ManagerRegistry $doctrine, int $id): Response
    {
        $em = $doctrine->getManager();
        $brand = $em->getRepository(Brand::class)->find($id);
        $brand->setName("Some updated brand");
        $em->flush();
        return new Response("Brand updated successfully ".$brand->getName());
    }

    #[Route('/brand/{id}', name: 'show_brand')]
    public function show(Brand $brand): Response
    {
        return new Response("Brand name: ".$brand->getName());
    }

    #[Route('/brand/delete/{id}', name: 'delete_brand')]
    public function delete(ManagerRegistry $doctrine, Brand $brand): Response
    {
        $em = $doctrine->getManager();
        $em->remove($brand);
        $em->flush();
        return new Response("Brand removed");
    }
}
