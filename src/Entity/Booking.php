<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_order","list_order"})
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups({"show_order","list_order"})
     */
    private $total_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Groups({"show_order"})
     */
    private $shipping_price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show_order"})
     */
    private $shipping_method;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="booking")
     * @Groups({"show_order","list_order"})
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity=BookingItem::class, mappedBy="booking")
     * @Groups({"show_order"})
     */
    private $items;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_order"})
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_order"})
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_order"})
     */
    private $shipping_street;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_order"})
     */
    private $shipping_city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_order"})
     */
    private $shipping_state;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_order"})
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show_order"})
     */
    private $phone_number;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups({"show_order","list_order"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalPrice(): ?string
    {
        return $this->total_price;
    }

    public function setTotalPrice(string $total_price): self
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getShippingPrice(): ?string
    {
        return $this->shipping_price;
    }

    public function setShippingPrice(string $shipping_price): self
    {
        $this->shipping_price = $shipping_price;

        return $this;
    }

    public function getShippingMethod(): ?string
    {
        return $this->shipping_method;
    }

    public function setShippingMethod(string $shipping_method): self
    {
        $this->shipping_method = $shipping_method;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|BookingItem[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(BookingItem $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setBooking($this);
        }

        return $this;
    }

    public function removeItem(BookingItem $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getBooking() === $this) {
                $item->setBooking(null);
            }
        }

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getShippingStreet(): ?string
    {
        return $this->shipping_street;
    }

    public function setShippingStreet(?string $shipping_street): self
    {
        $this->shipping_street = $shipping_street;

        return $this;
    }

    public function getShippingCity(): ?string
    {
        return $this->shipping_city;
    }

    public function setShippingCity(?string $shipping_city): self
    {
        $this->shipping_city = $shipping_city;

        return $this;
    }

    public function getShippingState(): ?string
    {
        return $this->shipping_state;
    }

    public function setShippingState(?string $shipping_state): self
    {
        $this->shipping_state = $shipping_state;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(?string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
