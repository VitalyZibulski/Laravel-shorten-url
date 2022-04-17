<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;

class ShortLinkDeleteHandler
{
    private ShortLinksRepositoryInterface $shortLinksRepository;

    public function __construct(ShortLinksRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(Link $shortLink): ?bool
    {
        return $this->shortLinksRepository->delete($shortLink);
    }
}
