<?php

namespace App\Entity;

use App\Repository\PurchaseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PurchaseRepository::class)
 */
class Purchase
{
    public const STATUS_PENDING = 'EN_ATTENTE';
    public const STATUS_PAID = 'PAYEE';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status = 'EN_ATTENTE';

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="purchases")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $purchasedAt;

    /**
     * @ORM\OneToMany(targetEntity=PurchaseLine::class, mappedBy="purchase", orphanRemoval=true)
     */
    private $purchaseLines;



    public function __construct()
    {
        $this->purchaseLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPurchasedAt(): ?\DateTimeInterface
    {
        return $this->purchasedAt;
    }

    public function setPurchasedAt(?\DateTimeInterface $purchasedAt): self
    {
        $this->purchasedAt = $purchasedAt;

        return $this;
    }

    /**
     * @return Collection|PurchaseLine[]
     */
    public function getPurchaseLines(): Collection
    {
        return $this->purchaseLines;
    }

    public function addPurchaseLine(PurchaseLine $purchaseLine): self
    {
        if (!$this->purchaseLines->contains($purchaseLine)) {
            $this->purchaseLines[] = $purchaseLine;
            $purchaseLine->setPurchase($this);
        }

        return $this;
    }

    public function removePurchaseLine(PurchaseLine $purchaseLine): self
    {
        if ($this->purchaseLines->removeElement($purchaseLine)) {
            // set the owning side to null (unless already changed)
            if ($purchaseLine->getPurchase() === $this) {
                $purchaseLine->setPurchase(null);
            }
        }

        return $this;
    }
}
