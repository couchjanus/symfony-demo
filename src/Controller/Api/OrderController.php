<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class OrderController extends AbstractController
{
    public function __construct(
        private SerializerInterface $serializer
    ){}

    #[Route('/orders')]
    public function setOrder(Request $request): JsonResponse
    {
        dump($request);
        return new JsonResponse([
            'success' => $this->serializer->serialize('ok', 'json')
        ], 200);
    }
}