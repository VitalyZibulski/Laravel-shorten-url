<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShortLinkStoreRequest;
use App\Http\Resources\LinkResource;
use App\Services\ShortLinks\ShortLinksService;
use App\Services\StatisticInformation\StatisticInformationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApiShortLinkController extends Controller
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

    public function index(): LinkResource
    {
        $shortLinks = $this->shortLinksService->getList();
        return new LinkResource($shortLinks);
    }

    public function store(ShortLinkStoreRequest $request): LinkResource
    {
        $link = $this->shortLinksService->create($request->validated());
        $link->tags()->sync($request->tags);

        return new LinkResource($link);
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

        return $originalLink->original_link;
    }
}
