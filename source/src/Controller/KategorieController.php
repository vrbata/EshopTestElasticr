<?php

namespace App\Controller;

use App\Entity\Kategorie;
use App\Form\FilterFixniHodnotaType;
use App\Form\FilterVyrobceType;
use App\Form\KategorieType;
use App\Repository\KategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kategorie")
 */
class KategorieController extends AbstractController
{
    /**
     * @Route("/", name="kategorie_index", methods={"GET"})
     */
    public function index(KategorieRepository $kategorieRepository): Response
    {
        return $this->render('kategorie/index.html.twig', [
            'kategories' => $kategorieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/hodinky", name="kategorie_index", methods={"GET"})
     */
    public function indexHodinky(Request $request)
    {
        $formCena = $this->createForm(FilterCenaType::class);
        $formVyrobce = $this->createForm(FilterVyrobceType::class);
        $formBarva = $this->createForm(FilterBarvaType::class);
        $formVodotesnost = $this->createForm(FilterSlideHandCisHodn::class, null, array(
            'Kategorie' => 'Hodinky',
            'NazevStitku' => 'Vodotesnost',
        ));

        $formCena->handleRequest($request);
        if ($formCena->isSubmitted() && $formCena->isValid()) {

            $data = $formCena->getData()
            //$data['cenaOd']
            //$data['cenaDo']

            return $this->render('....', [
                'polozkas' => $....repository->findCenaOdDoKategorie($data['cenaOd'], $data['cenaDo'], 'Hodinky'),
            ]);

        }

        $formVyrobce->handleRequest($request);
        if ($formVyrobce->isSubmitted() && $formVyrobce->isValid()) {
    
            $data = $formVyrobce->getData()
            //$data['Vyrobce']

            return $this->render('....', [
                'polozkas' => $....repository->findByVyrobce($data['Vyrobce'],  'Hodinky'),
            ]);

        }

        $formBarva->handleRequest($request);
        if ($formBarva->isSubmitted() && $formBarva->isValid()) {

            $data = $formVyrobce->getData()
            //$data['Barva']

            return $this->render('....', [
                'polozkas' => $....repository->findByBarva($data['Vyrobce'],  'Hodinky'),
            ]);

        }

        $formVodotesnost->handleRequest($request);
        if ($formVodotesnost->isSubmitted() && $formVodotesnost->isValid()) {
            $data = $formVodotesnost->getData();
            //$data['Barva']

            return $this->render('....', [
                'polozkas' => $....repository->findByBarva($data['SlideHand'],  'Hodinky'),
            ]);

    
        }

        return $this->render('...', [
            'formCenas'=>$formCena->createView(),
            'formVyrobces'=>$formVyrobce->createView(),
            'formBarvas'=>$formBarva->createView(),
            'formVodotesnosts'=>$formVodotesnost->createView(),
        ]);

    }

    /**
     * @Route("/budiky", name="kategorie_index", methods={"GET"})
     */
    public function indexBudíky(Request $request)
    {
        $formCena = $this->createForm(FilterCenaType::class);
        $formBarva = $this->createForm(FilterBarvaType::class);
        $formFixniHodnota = $this->createForm(FilterFixniHodnotaType::class, null, , null, array(
            'Kategorie' => 'Budiky',
            'NazevStitku' => 'Cifernik',
        ));

        $formCena->handleRequest($request);
        if ($formCena->isSubmitted() && $formCena->isValid()) {

            $data = $formCena->getData();
            //$data['cenaOd']
            //$data['cenaDo']

            return $this->render('....', [
                'polozkas' => $....repository->findCenaOdDoKategorie($data['cenaOd'], $data['cenaDo'], 'Budiky'),
            ]);

        }

        
        $formBarva->handleRequest($request);
        if ($formBarva->isSubmitted() && $formBarva->isValid()) {

            $data = $formVyrobce->getData()
            //$data['Barva']

            return $this->render('....', [
                'polozkas' => $....repository->findByBarva($data['Vyrobce'],  'Budiky'),
            ]);

        }

        $formFixniHodnota->handleRequest($request);
        if ($formFixniHodnota->isSubmitted() && $formFixniHodnota->isValid()) {
            $data = $formFixniHodnota->getData()
            //$data['Nazev']

            return $this->render('....', [
                'polozkas' => $....repository->findByBarva($data['Nazev'],  'Budiky'),
            ]);

    
        }
    }
   }