<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Step;

class StepExtension extends AbstractExtension
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('nextStepExist', [$this, 'checkIfExistNextStep']),
        ];
    }

    public function checkIfExistNextStep(int $arrival, int $trip) : int
    {
        $em = $this->entityManager;
        $repo = $em->getRepository("App:Step");

        $step = $repo
            ->count([
                'departure' => $arrival,
                'trip' => $trip
            ]);
        
        return $step;
    }
}