<?php
declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Sourcetoad\PhpunitCoverageActionSample\Cat;

class CatTest extends TestCase
{
    public function testLegsAreFour(): void
    {
        $this->assertEquals(4, (new Cat())->legs());
    }

    public function testEyesAreTwo(): void
    {
        $this->assertEquals(2, (new Cat)->eyes());
    }
}
