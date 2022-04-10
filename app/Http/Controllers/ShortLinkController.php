<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortLinkStoreRequest;
use App\Models\ShortLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ShortLinkController extends Controller
{
    public function index(): View
    {
        return view('shortLink', [
           'shortLinks' => ShortLink::latest()->get()
        ]);
    }

    public function store(ShortLinkStoreRequest $request): RedirectResponse
    {
        ShortLink::create([
            'original_link' => $request->link,
            'short_code' => Str::random(6)
        ]);

        return redirect()->route('generate.short-link')->with('success', 'Short link was created');
    }

    public function getShortLink($link): RedirectResponse
    {
        $originalLink = ShortLink::where('short_code', $link)->first();
        $originalLink->visits++;
        $originalLink->save();

        return redirect($originalLink->original_link);
    }
}
