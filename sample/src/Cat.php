<?php
declare(strict_types=1);

namespace Sourcetoad\PhpunitCoverageActionSample;

class Cat extends Pet
{
    public function legs(): int
    {
        return 4;
    }

    public function eyes(): int
    {
        return 2;
    }
}
