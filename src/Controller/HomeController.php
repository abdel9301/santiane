<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\Collection;
use App\Form\SearchTripType;
use App\Entity\Step;
use App\Entity\Trip;
use App\Service\Steps as ServiceSteps;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/trip/{voyage}", name="trip")
     */
    public function trip(Request $request, string $voyage, ServiceSteps $stepsService)
    {
        $steps = $stepsService->getSteps('file/'.$voyage.'.json');

        return $this->render('trip.html.twig', [
            'steps'    => $steps,
        ]);
    }
}