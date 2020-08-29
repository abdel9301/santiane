<?php

namespace Tests\App\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Trip;

class TripTest extends TestCase
{
    public function getEntity(): Trip
    {
        return (new Trip())
            ->setName('Voyage test');
    }

    public function testValidNameEntity()
    {
        $this->assertEquals('Voyage test', $this->getEntity()->getName());
    }
}