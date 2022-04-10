<?php

namespace App\Services\ShortLinks\Repositories;

use App\Models\ShortLink;
use Illuminate\Database\Eloquent\Collection;

interface ShortLinksRepositoryInterface
{
    public function getAll(): Collection;

    public function find(string $shortCode): ?ShortLink;

    public function create(array $data): ShortLink;

    public function update(ShortLink $shortLink, array $data): ShortLink;

    public function delete(ShortLink $shortLink): ?bool;
}
