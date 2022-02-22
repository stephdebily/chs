<?php

namespace App\Controller\Purchase;

use DateTime;
use App\Entity\Purchase;
use App\Cart\CartService;
use App\Entity\PurchaseLine;
use App\Form\CartConfirmationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use App\Controller\Purchase\PurchasePersister;
use App\Purchase\PurchasePersister as PurchasePurchasePersister;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class PurchaseConfirmationController extends AbstractController
{
    protected $security;
    protected $cartService;
    protected $em;
    protected $persister;

    public function __construct(
        Security $security,
        CartService $cartService,
        EntityManagerInterface $em,
        PurchasePurchasePersister $persister
    ) {
        $this->security = $security;
        $this->cartService = $cartService;
        $this->em = $em;
        $this->persister = $persister;
    }

    /**
     * @Route("/purchase/confirm", name="purchase_confirm")
     * 
     */
    public function confirm(Request $request)
    {
        // 1. lire les données du formulaire
        // FormFactoryInteface + Request

        $form = $this->createForm(CartConfirmationType::class);

        $form->handleRequest($request);
        // analyse de la request

        // 2. si form non soumis : sortie
        if (!$form->isSubmitted()) {

            $this->addFlash('warning', 'Vous devez remplir le formulaire de confirmation');

            return $this->redirectToRoute('cart_show');
        }

        // 3. si non connecté : sortie (Security)
        $user = $this->getUser();

        if (!$user) {
            throw new AccessDeniedException("Vous devez être connecté pour confirmer une commande");
        }

        // 4.si 0 produit dans panier : sortie (CartService)
        $cartItems = $this->cartService->getDetailedCartItems();

        if (count($cartItems) === 0) {
            $this->addFlash('warning', 'Vous ne pouvez confirmer une commande avec un panier vide');
            return $this->redirectToRoute('cart_show');
        }

        // 5.création d'une Purchase
        /** @var Purchase */
        $purchase = $form->getData();

        // appel du PurchasePersister
        $this->persister->storePurchase($purchase);

        return $this->redirectToRoute('purchase_payment_form', [
            'id' => $purchase->getId()
        ]);
    }
}
