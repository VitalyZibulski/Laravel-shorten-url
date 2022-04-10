<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\ShortLink;
use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;

class ShortLinkFindHandler
{
    private ShortLinksRepositoryInterface $shortLinksRepository;

    public function __construct(ShortLinksRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(string $shortCode): ?ShortLink
    {
        return $this->shortLinksRepository->find($shortCode);
    }
}
