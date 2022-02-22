<?php

namespace App\Controller\Purchase;

use App\Cart\CartService;
use App\Entity\Purchase;
use App\Repository\PurchaseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PurchasePaymentSuccessController extends AbstractController
{
    /**
     * @Route("/purchase/terminate/{id}", name="purchase_payment_success")
     */
    public function success($id, PurchaseRepository $purchaseRepository, EntityManagerInterface $em, CartService $cartService)
    {
        // 1.Recupération commande
        $purchase = $purchaseRepository->find($id);

        if (!$purchase || ($purchase && $purchase->getUser() !== $this->getUser())) {
            $this->addFlash('warning', "La commande n'existe pas");
            return $this->redirectToRoute("purchase_index");
        }

        // 2.passage à statut payée
        $purchase->setStatus(Purchase::STATUS_PAID);
        $em->flush();

        // 3.vider panier
        $cartService->empty();

        // 4.redirection vers la liste des commandes (flash)
        $this->addFlash('success', "La commande a été payée et confirmée");
        return $this->redirectToRoute("purchase_index");
    }
}
