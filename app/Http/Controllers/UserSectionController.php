<?php

namespace App\Http\Controllers;


use App\Repositories\Interfaces\SectionRepositoryInterface;

class UserSectionController extends Controller
{
    private SectionRepositoryInterface $sectionRepository;

    public function __construct(SectionRepositoryInterface $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function index()
    {
        $user = auth()->user();
        $subscription = $user->subscription;

        // Return sections based on the subscription level
        $sections = $this->sectionRepository->getSectionsByLevel($subscription->level);

        return response()->json($sections, 200);
    }

}
