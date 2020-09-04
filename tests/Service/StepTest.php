<?php
namespace App\Tests\Service;

use App\Service\Steps;
use PHPUnit\Framework\TestCase;

class StepTest extends TestCase
{
    public function testGetNextStep()
    {
        $steps = new Steps();
        $stepsGenerate = $steps->getSteps(__DIR__.'/../../public/file/voyage1.json');
        $result = $steps->getNextStep('Barcelona');

        $this->assertEquals('Barcelona', $result->departure);
        $this->assertEquals('Gerona Airport', $result->arrival);
    }
}