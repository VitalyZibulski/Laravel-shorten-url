<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\Link;
use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;

class ShortLinkUpdateHandler
{
    private ShortLinksRepositoryInterface $shortLinksRepository;

    public function __construct(ShortLinksRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(Link $shortLink, array $data): Link
    {
        return $this->shortLinksRepository->update($shortLink, $data);
    }
}
