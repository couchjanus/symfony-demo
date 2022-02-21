<?php

namespace App\Entity;

use App\Repository\BookingItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BookingItemRepository::class)
 */
class BookingItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_order"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"show_order"})
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups({"show_order"})
     */
    private $unit_price;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="bookingItems")
     * @Groups({"show_order"})
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=Booking::class, inversedBy="items")
     */
    private $booking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): ?string
    {
        return $this->unit_price;
    }

    public function setUnitPrice(string $unit_price): self
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    public function setBooking(?Booking $booking): self
    {
        $this->booking = $booking;

        return $this;
    }
}
