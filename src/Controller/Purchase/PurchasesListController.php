<?php

namespace App\Controller\Purchase;

use App\Entity\User;
use Twig\Environment;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PurchasesListController extends AbstractController
{
    protected $security;
    protected $router;
    protected $twig;

    public function __construct(Security $security, RouterInterface $router, Environment $twig)
    {
        $this->security = $security;
        $this->router = $router;
        $this->twig = $twig;
    }
    // la fonction est inutile puisque héritée de l'AbstractController

    public function index()
    {
        /**
         * @Route("/purchases", name="purchase_index")
         */
        // 1.personne connectée ? sinon retour page d'accueil@

        /** @var User */
        $user = $this->security->getUser();

        if (!$user) {
            //$url = $this->router->generate('homepage');
            //return new RedirectResponse($url);
            throw new AccessDeniedException("Vous devez être connecté pour accéder à vos commandes");
        }

        // 2.qui est connectée ?
        // 3.passer l'utilisateur à Twig

        return $this->render('purchase/index.html.twig', [
            'purchases' => $user->getPurchases()
        ]);
    }
}
