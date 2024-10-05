<?php

namespace App\Repositories\Interfaces;

interface SectionRepositoryInterface
{
    public function getSectionsByLevel(int $level);
}
