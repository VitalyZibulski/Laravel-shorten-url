<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkStoreRequest;
use App\Services\StatisticInformation\StatisticInformationService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ShortLinks\ShortLinksService;

class ShortLinkController extends Controller
{
    private ShortLinksService $shortLinksService;
    private StatisticInformationService $statisticInformationService;

    public function __construct(
        ShortLinksService           $shortLinksService,
        StatisticInformationService $statisticInformationService
    )
    {
        $this->shortLinksService = $shortLinksService;
        $this->statisticInformationService = $statisticInformationService;
    }

    public function index(): View
    {
        $shortLinks = $this->shortLinksService->getList();
        return view('shortLink', ['shortLinks' => $shortLinks]);
    }

    public function store(ShortLinkStoreRequest $request): RedirectResponse
    {
        $link = $this->shortLinksService->create($request->validated());
        $link->tags()->sync($request->tags);

        return redirect()->route('generate.short-link')->with('success', 'Short link was created');
    }

    public function getShortLink(Request $request, $shortLink): RedirectResponse
    {
        $originalLink = $this->shortLinksService->find($shortLink);

        if ($originalLink) {
            $statisticInformation = $this->statisticInformationService->getStatistic($request, $shortLink);
            $this->statisticInformationService->create($statisticInformation);
        }

        $originalLink->visits++;
        $originalLink->save();

        return redirect($originalLink->original_link);
    }
}
