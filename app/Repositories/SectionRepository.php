<?php

namespace App\Repositories;

use App\Models\Section;
use App\Repositories\Interfaces\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{

    public function getSectionsByLevel(int $level)
    {
        return Section::where('level', '<=', $level)->get();
    }
}
