<?php

namespace App\Services\ShortLinks\Repositories;

use App\Models\ShortLink;
use Illuminate\Database\Eloquent\Collection;

class EloquentShortLinksRepository implements ShortLinksRepositoryInterface
{
    public function getAll(): Collection
    {
        return ShortLink::latest()->get();
    }

    public function find(string $shortCode): ?ShortLink
    {
        return ShortLink::where('short_code', $shortCode)->first();
    }

    public function create(array $data): ShortLink
    {
        return ShortLink::create($data);
    }

    public function update(ShortLink $shortLink, array $data): ShortLink
    {
        $shortLink->update($data);
        return $shortLink;
    }

    public function delete(ShortLink $shortLink): ?bool
    {
        return $shortLink->delete();
    }
}
