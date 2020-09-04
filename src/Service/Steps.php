<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;

class Steps
{
    private $finalStepList = [];
    private $steps = [];

    private function getFile(string $file) :Response
    {
        $response = new Response();
        $response->setContent(file_get_contents($file));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function getSteps(string $file) :array
    {
        $json = $this->getFile($file);
        $this->steps = $this->steps = json_decode($json->getContent());

        $steps = $this->verificationSteps();

        return $steps;
    }

    public function verificationSteps() :array
    {
        // Je récupere l'étape de depart et l'etape de fin
        $departureStep = $this->getStepDeparture();
        $arrivalStep = $this->getStepArrival();

        $itsArrival = false;
        $cityStepArrival = $departureStep->arrival;

        // Tant que l'on a pas trouvé l'arrivee, on continue
        while (!$itsArrival) {

            // On verifie l'étape suivante à partir de la ville d'arriver précédente  et on insére dans un tableau
           $nextStep = $this->getNextStep($cityStepArrival);
           array_push($this->finalStepList , $nextStep);
            // Mise à jour de la ville d'arrivée
           $cityStepArrival = $nextStep->arrival;

           // Si la ville d'arrivée en cours est l'arrivée, on stop le process
           if ($nextStep->arrival == $arrivalStep->arrival) {
               $itsArrival = true;
               break;
           }

        }

        array_unshift($this->finalStepList , $departureStep);

        return $this->finalStepList;
    }

    public function getStepDeparture()
    {
        $arrivals = $this->getArrivals();
        foreach ($this->steps as $key => $step) {
            if (!in_array($step->departure, $arrivals)) {
                return $step;
            }
        }
    }

    public function getStepArrival()
    {
        $departures = $this->getDepartures();
        foreach ($this->steps as $key => $step) {
            if (!in_array($step->arrival, $departures)) {
                return $step;
            }
        }
    }

    public function getNextStep(string $arrival)
    {
        foreach ($this->steps as $key => $step) {
            if ($step->departure == $arrival) {
                return $step;
            }
        }
    }


    public function getArrivals()
    {
        foreach ($this->steps as $step) {
            $arrayArrivals[] = $step->arrival;
        }

        return $arrayArrivals;
    }

    public function getDepartures()
    {
        foreach ($this->steps as $step) {
            $arrayDepartures[] = $step->departure;
        }

        return $arrayDepartures;
    }
}
