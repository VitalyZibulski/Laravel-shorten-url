<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ShortLinks\ShortLinksService;

class ShortLinkController extends Controller
{
    private ShortLinksService $shortLinksService;

    public function __construct(
        ShortLinksService $shortLinksService
    )
    {
        $this->shortLinksService = $shortLinksService;
    }

    public function index(): View
    {
        $shortLinks = $this->shortLinksService->getList();
        return view('shortLink', ['shortLinks' => $shortLinks]);
    }

    public function store(ShortLinkStoreRequest $request): RedirectResponse
    {
        $this->shortLinksService->create($request->validated());
        return redirect()->route('generate.short-link')->with('success', 'Short link was created');
    }

    public function getShortLink(string $shortLink): RedirectResponse
    {
        $originalLink = $this->shortLinksService->find($shortLink);
        $originalLink->visits++;
        $originalLink->save();

        return redirect($originalLink->original_link);
    }
}
