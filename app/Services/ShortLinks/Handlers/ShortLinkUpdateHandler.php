<?php

namespace App\Services\ShortLinks\Handlers;

use App\Models\ShortLink;
use App\Services\ShortLinks\Repositories\ShortLinksRepositoryInterface;

class ShortLinkUpdateHandler
{
    private ShortLinksRepositoryInterface $shortLinksRepository;

    public function __construct(ShortLinksRepositoryInterface $shortLinksRepository)
    {
        $this->shortLinksRepository = $shortLinksRepository;
    }

    public function handle(ShortLink $shortLink, array $data): ShortLink
    {
        return $this->shortLinksRepository->update($shortLink, $data);
    }
}
