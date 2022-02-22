<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use App\Entity\Category;
use App\Repository\ProductRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/ajoutCat", name="ajoutcat")
     */
    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->setName('lame');
        $category->setSlug('lame');
        $category1 = new Category();
        $category1->setName('courroie');
        $category1->setSlug('courroie');
        $category2 = new Category();
        $category2->setName('cable');
        $category2->setSlug('cable');
        $category3 = new Category();
        $category3->setName('huile');
        $category3->setSlug('huile');
        $category4 = new Category();
        $category4->setName('roue');
        $category4->setSlug('roue');
        $category5 = new Category();
        $category5->setName('accessoire');
        $category5->setSlug('accessoire');

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($category1);
        $em->persist($category2);
        $em->persist($category3);
        $em->persist($category4);
        $em->persist($category5);

        $em->flush();

        return new Response("categories ajoutées");
    }


    /**
     * @Route("/ajout", name="ajout")
     */
    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->setName('2-lames-Mcculloch-MBO033');
        $product->setPrice('26.99');
        $product->setSlug('2-lames-Mcculloch-MBO033');
        $product->setShortDescription('2 Lames mulching pour tracteur autoportée 97cm éjection latéral');
        $product->setStock('5');

        $product1 = new Product();
        $product1->setName('2-roues-motrice-574465104-2');
        $product1->setPrice('56.4');
        $product1->setSlug('2-roues-motrice-574465104-2');
        $product1->setShortDescription('2 Roues motrice pour tondeuse robot');
        $product1->setStock('4');

        $product2 = new Product();
        $product2->setName('3m-cable-alimentation-bt-579825103');
        $product2->setPrice('23.28');
        $product2->setSlug('3m-cable-alimentation-bt-579825103');
        $product2->setShortDescription('3m de câble alimentation basse tension pour tondeuse robot automower');
        $product2->setStock('2');

        $product3 = new Product();
        $product3->setName('10m-cable-alimentation-bt-579825102');
        $product3->setPrice('36.43');
        $product3->setSlug('10m-cable-alimentation-bt-579825102');
        $product3->setShortDescription('10m de câble alimentation basse tension pour tondeuse robot');
        $product3->setStock('3');

        $product4 = new Product();
        $product4->setName('20m-cable-alimentation-bt-579825101');
        $product4->setPrice('57.86');
        $product4->setSlug('20m-cable-alimentation-bt-579825101');
        $product4->setShortDescription('20m de câble alimentation basse tension pour tondeuse robot');
        $product4->setStock('3');

        $product5 = new Product();
        $product5->setName('bac-ramassage-200l-OEM-190-180A');
        $product5->setPrice('431.61');
        $product5->setSlug('bac-ramassage-200l-OEM-190-180A');
        $product5->setShortDescription('Bac de ramassage complet double 200L pour tracteur tondeuse');
        $product5->setStock('1');

        $product6 = new Product();
        $product6->setName('bougie-BPR5ES');
        $product6->setPrice('4.22');
        $product6->setSlug('bougie-BPR5ES');
        $product6->setShortDescription('Bougie allumage BPR5ES culot long');
        $product6->setStock('6');

        $product7 = new Product();
        $product7->setName('cable-connexion-tondeuse-robot-591203601');
        $product7->setPrice('13.19');
        $product7->setSlug('cable-connexion-tondeuse-robot-591203601');
        $product7->setShortDescription('Câble de connexion pour tondeuse robot');
        $product7->setStock('5');

        $product8 = new Product();
        $product8->setName('cable-embrayage-532196541');
        $product8->setPrice('55.73');
        $product8->setSlug('cable-embrayage-532196541');
        $product8->setShortDescription('Câble embrayage de lame pour tondeuse à gazon');
        $product8->setStock('6');

        $product9 = new Product();
        $product9->setName('cable-station-charge-581225903');
        $product9->setPrice('48.89');
        $product9->setSlug('cable-station-charge-581225903');
        $product9->setShortDescription('Câble pour station de charge pour robot ');
        $product9->setStock('4');

        $product10 = new Product();
        $product10->setName('cable-traction-532406259');
        $product10->setPrice('56.82');
        $product10->setSlug('cable-traction-532406259');
        $product10->setShortDescription('Câble de traction pour tondeuse');
        $product10->setStock('1');

        $product11 = new Product();
        $product11->setName('cable-traction-532440855');
        $product11->setPrice('66.91');
        $product11->setSlug('cable-traction-532440855');
        $product11->setShortDescription('Câble de traction pour MOWCART 66');
        $product11->setStock('6');

        $product12 = new Product();
        $product12->setName('carter-courroie-Mcculloch-544462202');
        $product12->setPrice('24.78');
        $product12->setSlug('carter-courroie-Mcculloch-544462202');
        $product12->setShortDescription('Carter de courroie pour tondeuse à gazon');
        $product12->setStock('2');

        $product13 = new Product();
        $product13->setName('carter-courroie-Mcculloch-544462302');
        $product13->setPrice('25.99');
        $product13->setSlug('carter-courroie-Mcculloch-544462302');
        $product13->setShortDescription('Carter de courroie pour tondeuse à gazon');
        $product13->setStock('2');

        $product14 = new Product();
        $product14->setName('courroie-lame-532419271');
        $product14->setPrice('69.98');
        $product14->setSlug('courroie-lame-532419271');
        $product14->setShortDescription('Courroie de lame (coupe) pour tracteur tondeuse');
        $product14->setStock('4');

        $product15 = new Product();
        $product15->setName('courroie-lame-532439726');
        $product15->setPrice('58.99');
        $product15->setSlug('courroie-lame-532439726');
        $product15->setShortDescription('courroie-lame-532439726');
        $product15->setStock('5');

        $product16 = new Product();
        $product16->setName('courroie-traction-504103301');
        $product16->setPrice('21.97');
        $product16->setSlug('courroie-traction-504103301');
        $product16->setShortDescription('Courroie de traction pour tondeuse à gazon');
        $product16->setStock('3');

        $product17 = new Product();
        $product17->setName('courroie-traction-532194149');
        $product17->setPrice('22.79');
        $product17->setSlug('courroie-traction-532194149');
        $product17->setShortDescription('Courroie de traction pour tondeuse');
        $product17->setStock('3');

        $product18 = new Product();
        $product18->setName('courroie-traction-548362301');
        $product18->setPrice('89.99');
        $product18->setSlug('courroie-traction-548362301');
        $product18->setShortDescription('Courroie de traction pour tracteur autoportée');
        $product18->setStock('1');

        $product19 = new Product();
        $product19->setName('courroie-traction-589534001');
        $product19->setPrice('62.16');
        $product19->setSlug('courroie-traction-589534001');
        $product19->setShortDescription('Courroie pour tracteur et rider tondeuse');
        $product19->setStock('3');

        $product20 = new Product();
        $product20->setName('courroie-traction-589563301');
        $product20->setPrice('23.99');
        $product20->setSlug('courroie-traction-589563301');
        $product20->setShortDescription('Courroie de traction pour tondeuse');
        $product20->setStock('3');

        $product21 = new Product();
        $product21->setName('courroie-turbine-532408007');
        $product21->setPrice('45.59');
        $product21->setSlug('courroie-turbine-532408007');
        $product21->setShortDescription('Courroie de turbine pour fraise à neige');
        $product21->setStock('1');

        $product22 = new Product();
        $product22->setName('huile-2t-LS+-1l-578037002');
        $product22->setPrice('16.68');
        $product22->setSlug('huile-2t-LS+-1l-578037002');
        $product22->setShortDescription('Huile moteur 2 temps LS+ - 1L');
        $product22->setStock('6');

        $product23 = new Product();
        $product23->setName('huile-HP-Super-Ultra-0,1l-07813198060');
        $product23->setPrice('5.76');
        $product23->setSlug('huile-HP-Super-Ultra-0,1l-07813198060');
        $product23->setShortDescription('Dosette huile HP Super Ultra 0.1 litre');
        $product23->setStock('4');

        $product24 = new Product();
        $product24->setName('huile-moteur-2-temps-1l-07813198053');
        $product24->setPrice('20.94');
        $product24->setSlug('huile-moteur-2-temps-1l-07813198053');
        $product24->setShortDescription('Huile moteur 2 temps HP super');
        $product24->setStock('5');

        $product25 = new Product();
        $product25->setName('huile-moteur-2-temps-1l-07813198054');
        $product25->setPrice('21.59');
        $product25->setSlug('huile-moteur-2-temps-1l-07813198054');
        $product25->setShortDescription('1 litre huile pour moteur 2 temps et moteur 4-mix');
        $product25->setStock('2');

        $product26 = new Product();
        $product26->setName('huile-moteur-4-temps-SAE30-OLO001');
        $product26->setPrice('5.3');
        $product26->setSlug('huile-moteur-4-temps-SAE30-OLO001');
        $product26->setShortDescription('Huile moteur 4 temps 600ml');
        $product26->setStock('5');

        $product27 = new Product();
        $product27->setName('huile-moteur-SAE-30-2l-100008E');
        $product27->setPrice('14.39');
        $product27->setSlug('huile-moteur-SAE-30-2l-100008E');
        $product27->setShortDescription('2L huile moteur 4 temps SAE-30');
        $product27->setStock('3');

        $product28 = new Product();
        $product28->setName('huile-moteur-SAE-30-600ml-100005E');
        $product28->setPrice('4.92');
        $product28->setSlug('huile-moteur-SAE-30-600ml-100005E');
        $product28->setShortDescription('Huile moteur 4 temps SAE-30 600ml');
        $product28->setStock('5');

        $product29 = new Product();
        $product29->setName('kit-entretien-9100-X2-1006');
        $product29->setPrice('39.5');
        $product29->setSlug('kit-entretien-9100-X2-1006');
        $product29->setShortDescription('Kit entretien pour moteur THORX OHV 420cc');
        $product29->setStock('4');

        $product30 = new Product();
        $product30->setName('kit-entretien-599896401');
        $product30->setPrice('106.41');
        $product30->setSlug('kit-entretien-599896401');
        $product30->setShortDescription('Kit entretien pour tracteur ou rider');
        $product30->setStock('2');

        $product30 = new Product();
        $product30->setName('kit-mulching-196-334-600');
        $product30->setPrice('88.99');
        $product30->setSlug('kit-mulching-196-334-600');
        $product30->setShortDescription('Kit mulching avec déflecteur pour mini rider 76RDE ');
        $product30->setStock('4');

        $product31 = new Product();
        $product31->setName('lame-honda-72511-VE1-651');
        $product31->setPrice('18.93');
        $product31->setSlug('lame-honda-72511-VE1-651');
        $product31->setShortDescription('Lame adaptable pour tondeuse HONDA');
        $product31->setStock('2');

        $product32 = new Product();
        $product32->setName('lame-Husqvarna-506930810');
        $product32->setPrice('40.46');
        $product32->setSlug('lame-Husqvarna-506930810');
        $product32->setShortDescription('Lame de coupe pour tracteur rider');
        $product32->setStock('3');

        $product33 = new Product();
        $product33->setName('lame-Husqvarna-531007586');
        $product33->setPrice('35.9');
        $product33->setSlug('lame-Husqvarna-531007586');
        $product33->setShortDescription('Lame standard 45cm pour plateau de coupe 90cm');
        $product33->setStock('1');

        $product34 = new Product();
        $product34->setName('lame-Husqvarna-532406712');
        $product34->setPrice('31.79');
        $product34->setSlug('lame-Husqvarna-532406712');
        $product34->setShortDescription('Lame 53 cm pour tondeuse');
        $product34->setStock('4');

        $product35 = new Product();
        $product35->setName('lame-Mcculloch-MBO020');
        $product35->setPrice('18.99');
        $product35->setSlug('lame-Mcculloch-MBO020');
        $product35->setShortDescription('Lame de coupe 50cm combi pour tondeuse à gazon');
        $product35->setStock('12');

        $product36 = new Product();
        $product36->setName('lame-Mcculloch-MBO026');
        $product36->setPrice('17.28');
        $product36->setSlug('lame-Mcculloch-MBO026');
        $product36->setShortDescription('Lame de coupe 53cm combi pour tondeuse à gazon');
        $product36->setStock('122');

        $product37 = new Product();
        $product37->setName('lame-Mcculloch-MBO068');
        $product37->setPrice('21');
        $product37->setSlug('lame-Mcculloch-MBO068');
        $product37->setShortDescription('Lame de coupe 56cm PX3 fixation étoile');
        $product37->setStock('14');

        $product38 = new Product();
        $product38->setName('palier-lame-587819701');
        $product38->setPrice('41.16');
        $product38->setSlug('palier-lame-587819701');
        $product38->setShortDescription('Palier de lame complet pour tracteur tondeuse');
        $product38->setStock('1');

        $product39 = new Product();
        $product39->setName('palier-lame-AD-6508016');
        $product39->setPrice('39.76');
        $product39->setSlug('palier-lame-AD-6508016');
        $product39->setShortDescription('Palier de lame');
        $product39->setStock('16');

        $product40 = new Product();
        $product40->setName('roue-arrière-Mcculloch-581010305');
        $product40->setPrice('27.42');
        $product40->setSlug('roue-arrière-Mcculloch-581010305');
        $product40->setShortDescription('Roue arrière Droit ou Gauche pour tondeuse');
        $product40->setStock('5');

        $product41 = new Product();
        $product41->setName('roue-arriere-robot-tondeuse-583853902');
        $product41->setPrice('22.49');
        $product41->setSlug('roue-arriere-robot-tondeuse-583853902');
        $product41->setShortDescription('Roue arriere sans support pour tondeuse robot');
        $product41->setStock('1');

        $product42 = new Product();
        $product42->setName('roue-avant-Mcculloch-581420602');
        $product42->setPrice('55.56');
        $product42->setSlug('roue-avant-Mcculloch-581420602');
        $product42->setShortDescription('Roue avant pour MOWCART 66');
        $product42->setStock('1');

        $product43 = new Product();
        $product43->setName('roue-de-traction-Mcculloch-581009201');
        $product43->setPrice('31.67');
        $product43->setSlug('roue-de-traction-Mcculloch-581009201');
        $product43->setShortDescription('Roue de traction avant noir');
        $product43->setStock('45');

        $product44 = new Product();
        $product44->setName('roue-de-traction-Mcculloch-583719401');
        $product44->setPrice('27.99');
        $product44->setSlug('roue-de-traction-Mcculloch-583719401');
        $product44->setShortDescription('Roue de traction (avant ou arrière) pour tondeuse à gazon');
        $product44->setStock('2');

        $product44 = new Product();
        $product44->setName('roue-motrice-robot-tondeuse-501106301');
        $product44->setPrice('35.99');
        $product44->setSlug('roue-motrice-robot-tondeuse-501106301');
        $product44->setShortDescription('Roue motrice pour robot tondeuse SILENO');
        $product44->setStock('6');

        $product45 = new Product();
        $product45->setName('roue-motrice-robot-tondeuse-582280201');
        $product45->setPrice('34.79');
        $product45->setSlug('roue-motrice-robot-tondeuse-582280201');
        $product45->setShortDescription('Roue motrice pour robot automower');
        $product45->setStock('1');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->persist($product1);
        $em->persist($product2);
        $em->persist($product3);
        $em->persist($product4);
        $em->persist($product5);
        $em->persist($product6);
        $em->persist($product7);
        $em->persist($product8);
        $em->persist($product9);
        $em->persist($product10);
        $em->persist($product11);
        $em->persist($product12);
        $em->persist($product13);
        $em->persist($product14);
        $em->persist($product15);
        $em->persist($product16);
        $em->persist($product17);
        $em->persist($product18);
        $em->persist($product19);
        $em->persist($product20);
        $em->persist($product21);
        $em->persist($product22);
        $em->persist($product23);
        $em->persist($product24);
        $em->persist($product25);
        $em->persist($product26);
        $em->persist($product27);
        $em->persist($product28);
        $em->persist($product29);
        $em->persist($product30);
        $em->persist($product31);
        $em->persist($product32);
        $em->persist($product33);
        $em->persist($product34);
        $em->persist($product35);
        $em->persist($product36);
        $em->persist($product37);
        $em->persist($product38);
        $em->persist($product39);
        $em->persist($product40);
        $em->persist($product41);
        $em->persist($product42);
        $em->persist($product43);
        $em->persist($product44);
        $em->persist($product45);

        $em->flush();

        return new Response("produits ajoutés");
    }



    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ProductRepository $productRepository)
    {
        $products = $productRepository->findBy([], [], 45);

        return $this->render('home.html.twig', ['products' => $products]);
    }
}
