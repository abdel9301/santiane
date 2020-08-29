<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\Collection;
use App\Form\SearchTripType;
use App\Entity\Step;
use App\Entity\Trip;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $repoTrip = $this->getDoctrine()
        ->getRepository(Trip::class);

        $trips = $repoTrip->findAll();

        return $this->render('home.html.twig', [
            'trips' => $trips,
        ]);
    }

    /**
     * @Route("/trip/{id}", name="trip")
     */
    public function trip(Request $request, int $id)
    {
        $form = $this->createForm(SearchTripType::class);

        $form->handleRequest($request);
        $repoStep = $this->getDoctrine()
        ->getRepository(Trip::class);

        $trip = $repoStep->find($id);

        if (!$trip) {

            $this->addFlash(
                'danger',
                'Aucun voyage correspondant'
            );

            return $this->redirectToRoute('homepage');
        } 

        return $this->render('trip.html.twig', [
            'stepsTotal'    => $trip->getSteps(),
            'stepsPossible' => $trip->getStepsPossible(),
        ]);
    }
}