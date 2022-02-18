<?php

namespace App\Controller\Api;

use App\Repository\BookingItemRepository;
use App\Repository\BookingRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class OrderController extends AbstractController
{
    public function __construct(
        private SerializerInterface $serializer,
        private Security $security,
        private BookingRepository $bookingRepository,
        private BookingItemRepository $bookingItemRepository,
        private ProductRepository $productRepository
    ){}

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    #[Route('/orders')]
    public function setOrder(Request $request): JsonResponse
    {
        $jsonData = json_decode($request->getContent());
        $customer = $this->security->getUser();
        $jsonData->customer = $customer;

        $order = $this->bookingRepository->create($jsonData);

        foreach ($jsonData->cart_items as $item) {
            $productId = $item->id;
            $product = $this->productRepository->findOneById($productId);
            $price = $item->price;
            $quantity = $item->quantity;

            $data = new \stdClass();

            $data->oder = $order;
            $data->price = $price;
            $data->quantity = $quantity;
            $data->product = $product;

            $this->bookingItemRepository->create($data);

        }

        return new JsonResponse([
            'success' => $this->serializer->serialize('ok', 'json')
        ], 200);
    }
}