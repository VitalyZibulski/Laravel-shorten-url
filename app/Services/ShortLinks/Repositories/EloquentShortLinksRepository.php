<?php

namespace App\Services\ShortLinks\Repositories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Collection;

class EloquentShortLinksRepository implements ShortLinksRepositoryInterface
{
    public function getAll(): Collection
    {
        return Link::latest()->get();
    }

    public function find(string $shortCode): ?Link
    {
        return Link::where('short_code', $shortCode)->first();
    }

    public function create(array $data): Link
    {
        return Link::create($data);
    }

    public function update(Link $shortLink, array $data): Link
    {
        $shortLink->update($data);
        return $shortLink;
    }

    public function delete(Link $shortLink): ?bool
    {
        return $shortLink->delete();
    }
}
