<?php

namespace App\Services\ShortLinks\Repositories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Collection;

interface ShortLinksRepositoryInterface
{
    public function getAll(): Collection;

    public function find(string $shortCode): ?Link;

    public function create(array $data): Link;

    public function update(Link $shortLink, array $data): Link;

    public function delete(Link $shortLink): ?bool;
}
