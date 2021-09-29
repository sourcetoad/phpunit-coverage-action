<?php
declare(strict_types=1);

namespace Sourcetoad\PhpunitCoverageActionSample;

abstract class Pet
{
    public abstract function legs(): int;
    public abstract function eyes(): int;

    public function type(): string
    {
        return 'Mammal';
    }
}

