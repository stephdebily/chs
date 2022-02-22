<?php

namespace App\Purchase;

use App\Cart\CartService;
use DateTime;
use App\Entity\Purchase;
use App\Entity\PurchaseLine;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class PurchasePersister
{
    protected $security;
    protected $cartService;
    protected $em;

    public function __construct(Security $security, CartService $cartService, EntityManagerInterface $em)
    {
        $this->security = $security;
        $this->cartService = $cartService;
        $this->em = $em;
    }

    public function storePurchase(Purchase $purchase)
    {
        // Integrer tout ce qu'il faut et persister la purchase

        // 6.faire le lien avec l'utilisateur connecté (Security)
        $purchase->setUser($this->security->getUser())
            ->setPurchasedAt(new DateTime())
            ->setTotal($this->cartService->getTotal());

        $this->em->persist($purchase);

        // 7.faire le lien avec les produits qui sont dans le panier (CartService)
        foreach ($this->cartService->getDetailedCartItems() as $cartItem) {
            $purchaseLine = new PurchaseLine;
            $purchaseLine->setPurchase($purchase)
                ->setProduct($cartItem->product)
                ->setProductName($cartItem->product->getName())
                ->setQuantity($cartItem->qty)
                ->setTotal($cartItem->getTotal())
                ->setProductPrice($cartItem->product->getPrice());


            $this->em->persist($purchaseLine);
        }

        // 8.enreg la commande (EntityManagerInterface)
        $this->em->flush();
    }
}
