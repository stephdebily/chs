<?php

namespace App\Cart;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    protected $session;
    protected $productRepository;

    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    public function add(int $id)
    {
        // 1.Retrouver le panier dans la session (en tableau)
        // 2.Si pas de panier, alors prendre tableau vide
        $cart = $this->session->get('cart', []);

        // 3.Voir si le produit $id existe déjà dans le tableau
        // 4.si oui, augmenter quantité
        // 5.sinon ajouter produit avec la quantité
        if (array_key_exists($id, $cart)) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        // 6.Enregistrer le tableau mis à jour dans la session
        $this->session->set('cart', $cart);
    }

    public function remove(int $id)
    {
        $cart = $this->session->get('cart', []);

        unset($cart[$id]);

        $this->session->set('cart', $cart);
        // mis à jour du panier
    }

    public function decrement(int $id)
    {
        $cart = $this->session->get('cart', []);

        if (!array_key_exists($id, $cart)) {
            return;
        }

        // soit le produit est à 1 alors il faut le supprimer
        if ($cart[$id] === 1) {
            $this->remove($id);
            return;
        }
        // soit le produit est à + de 1 alors il faut decrementer
        $cart[$id]--;

        $this->session->set('cart', $cart);
        // mis à jour du panier

    }

    public function getTotal(): int
    {
        $total = 0;

        foreach ($this->session->get('cart', []) as $id => $qty) {
            $product = $this->productRepository->find($id);

            if (!$product) {
                continue;
            }

            $total += $product->getPrice() * $qty;
        }

        return $total;
    }

    /**
     * 
     * @return CartItem[]
     */
    public function getDetailedCartItems(): array
    {
        $detailedCart = [];
        //$total = 0;

        foreach ($this->session->get('cart', []) as $id => $qty) {
            $product = $this->productRepository->find($id);

            if (!$product) {
                continue;
            }

            $detailedCart[] = new CartItem($product, $qty);

            //$total += ($product->getPrice() * $qty);
        }

        return $detailedCart;
    }


    protected function saveCart(array $cart)
    {
        $this->session->set('cart', $cart);
    }

    public function empty()
    {
        $this->saveCart([]);
    }
}
