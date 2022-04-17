<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;

class ShortLinkFindHandler
{
    private ShortLinksRepositoryInterface $shortLinksRepository;

    public function __construct(ShortLinksRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(string $shortCode): ?Link
    {
        return $this->shortLinksRepository->find($shortCode);
    }
}
